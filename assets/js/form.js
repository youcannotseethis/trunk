
function validateForm2(form_name,obj,callback_success,callback_before,redirect_url,onerror_fn,abs){  
	if(callback_success && typeof(callback_success)=='string'){
		redirect_url = callback_success;
		callback_success = false;
	}else if(callback_before && typeof(callback_before)=='string'){
		redirect_url = callback_before;
		callback_before = false;
	}
	if(callback_before){
		if(callback_before()===false)
			return;
	}
	obj = jQuery(obj);
	if(obj.is('form')){
		var form = obj;
		obj = jQuery('input[type=submit]',obj);
	}else{
		var form = jQuery('form#' + form_name).length>0?jQuery('form#' + form_name):jQuery('form[name=' + form_name +']');//get form by name (default)or id
	}
	obj.attr('disabled','disabled');
	loading(obj);

		
	
	var action = form.attr('action');
	if(!action){
		alert("Error: could not find the form or it does not have action. Aborting.");
		return false;
	}
	if(abs){
		jQuery('.error',form).remove();
	}else{
		jQuery('.error span.errorMessage',form).remove();
		jQuery('.error',form).removeClass('error');
	}
	//submit value of disabled input

	//obj.removeAttr('disabled');
	var serial = form.serialize();

	jQuery.post(action,serial,function(data){
		var trimmed_data = jQuery.trim(data);
		if(trimmed_data.indexOf('{')===0){
			//php might say we have errors
			data = jQuery.parseJSON(trimmed_data);	
			if(typeof(data)=='object'){
				if(abs)
					jsonToErrorAbs(data,form);
				else
					jsonToError(data,form);
				if(onerror_fn)
					onerror_fn(trimmed_data);
				
			}
		}else{//only success gets here
			if(callback_success)
				callback_success(trimmed_data);
			//php might tell us to redirect to a url
			if(trimmed_data.indexOf('/')===0){
				window.location = trimmed_data;
			}else if(trimmed_data == 'reload'){
				location.reload();
			}else{
				if(redirect_url){
					if(redirect_url == 'reload'){
						location.reload(true);
						return;
					}else	
						window.location = redirect_url;
				}
			}
		}
		
		jQuery('.loading',form).remove();
		obj.removeAttr("disabled");
	});
	
	return false;
};
function validateForm(obj,callback_success,callback_before,redirect_url,onerror_fn){ 
	return validateForm2(false,obj,callback_success,callback_before,redirect_url,onerror_fn);
};
function validateFormAbs(obj,callback_success,callback_before,redirect_url,onerror_fn){ 
	return validateForm2(false,obj,callback_success,callback_before,redirect_url,onerror_fn,true);
};
//displays error messages from json object
function jsonToError(data,form){
	jQuery.each(data,function(k, v){
		var el = jQuery('[name="'+k+'"]',form);
		el.bind('change',function(){
			jQuery(this).parent().removeClass('error').unbind();
			jQuery('span.errorMessage',jQuery(this).parent()).remove();
		});
		var parent = el.parent();
		if(parent.hasClass('error')){
			parent.find('.errorMessage').append('<br/>'+v);
		}else{
			parent.addClass('error').append('<span class="errorMessage">' + v + '</span>');
		}
	});
	var scroll_destination = jQuery('.error:first');
	if(!scroll_destination.length>0)
		scroll_destination = jQuery('.error:first');
	scrollTo(scroll_destination);
}

function scrollTo(obj,onsuccess_fn){
	var scroll_to = 0;
	if(typeof(obj)=='object'){
		obj = jQuery(obj);
		if(obj.attr('type')=='hidden'){//offset() doesn't work with hidden stuff, so look for offset of parent
			scroll_to = obj.parent().offset().top;
		}else{
			scroll_to = obj.offset().top-20;
		}
		obj.focus();
	}else
		scroll_to = obj;

	var jbody = jQuery("html,body");
	var top = jQuery(window).scrollTop();
	if(top>scroll_to || (top+parseInt(jQuery(window).height()))<scroll_to){
		
		jQuery(jbody).animate({ 
			scrollTop: scroll_to
		}, 1300,function(){
			
			if(jQuery.isFunction(onsuccess_fn))
				onsuccess_fn();
			//obj.focus();
		})
	}else if(jQuery.isFunction(onsuccess_fn)){
		onsuccess_fn();
	}
};

//Clears input boxes onclick
//usage: <input value='enter zip' onclick=clearInputBox(this) name='zip'/>
//Does onclick/onblur logic to set default value,clear value or keep user inputed value
//If you save previosly entered input in your form, you must use second argument to specify the default value
var default_val = new Array();
function clearInputBox(obj,set_default_value,onclear_fn){
	var name = jQuery(obj).attr('id')?jQuery(obj).attr('id'):jQuery(obj).attr('name');
	var events = jQuery(obj).data('events');
	if(!events || (events && !events.blur)){
		default_val[name] = jQuery.trim(set_default_value?set_default_value:jQuery(obj).val());
		jQuery(obj).bind('blur',function(){
			var current_val = jQuery(obj).val();
			if(default_val[name] == current_val){
				jQuery(this).css('color','#999');
				jQuery(obj).val(default_val[name]);
			}else if(current_val == ''){
				jQuery(this).css('color','#999');
				jQuery(obj).val(default_val[name]);
			}
			return false;
		});
	}
	var current_val = jQuery(obj).val();
	jQuery(obj).css('color','#000');
	if(default_val[name] == jQuery.trim(current_val)){
		jQuery(obj).val('');
		
	}
	if(onclear_fn)
		onclear_fn();

}

function clearInputBox2(obj,default_text){
	var obj = jQuery(obj);
	var name = obj.attr('name');
	var val = obj.val();
	var events = obj.data('events');
	if(!events || (events && !events.blur)){
		obj.bind('blur',function(){
			var val = jQuery(this).val();
			if(!val){
				obj.val(default_text).css('color','#999');
			}
		});
	}
	if(val && default_text == val){
		obj.val('').css('color','#000');
	}

}
window.XD = function(){
	var interval_id,
	last_hash,
	attached_callback,
	window = this;
	function callbackMessage(hash,callback){
		var n=hash.split('&'); 
		var m = n[1];
		if (m !== last_hash && m) {
			last_hash = m;
			callback({data: m});
		}	
	}
	return {
		postMessage	:	function(message) {
			message =jQuery('#bcx_campaign_id').val()+'='+message;
			var window = this;
			var target_url = jQuery('#bcx_calling_url').val();
			if (!target_url) {
				return;
			}
			if (window['postMessage']) {
				parent['postMessage'](message, target_url.replace( /([^:]+:\/\/[^\/]+).*/, '$1'));
			} else if (target_url) {
				// the browser does not support window.postMessage, so use the window.location.hash fragment hack
				parent.location = target_url.replace(/#.*$/, '') + '#' + (Math.random()) + '&' + message;
			}
		},
		receiveMessage : function(callback) {
			 // a polling loop is started & callback is called whenever the location.hash changes
			 if (callback) {
				var hash = document.location.hash;
				if(hash){
					callbackMessage(hash,callback);
				}
				jQuery(window).bind('hashchange',function(){
					callbackMessage(document.location.hash,callback);
					
				});
			}
		}
		 
	};
}();

function loading(obj) {
	
	var l = jQuery('<span class="loading"></span>');
	l.insertAfter(obj);
	var offset = obj.position();
	if(!offset)
		return;
	obj_type = jQuery(obj).attr('type');
	if(offset.left<72){
		if(obj_type=='submit' || obj_type=='button')
			var side_offset = 10;
		else
			var side_offset = 30;
		l.css('left',offset.left+jQuery(obj).width()+side_offset);
	}else{
		if(obj_type=='submit' || obj_type=='button')
			var side_offset = 40;
		else
			var side_offset = 30;
		l.css('left',offset.left-side_offset);
	}
	l.css('top',offset.top);
}
