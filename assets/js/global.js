function closeLightbox(){
	$('#lightbox_temp').dialog('close');
}	
//To get an ajaxed lightbox - steps: 
//1) create a tpl with BOXNAME_Lightbox.tpl name
//2) call javascript function lightbox(BOXNAME)

function lightbox(box_name,width,obj,onsuccessfn,onclosefn) {
	var width = width?width:550;
	var m_obj =  {
					modal:true,
					zIndex: 10000,
					width: width,
					resizable: false,
					position:'center',
					height:'auto',
					autoOpen:true,
					close: function(){
						$(this).dialog('option',{beforeClose:false});
					}
				};
	if(typeof onclosefn=='function'){
		m_obj.beforeClose = function(){	
										onclosefn();
									};
	}
	if(typeof(obj)=='string'){
		m_obj = $.extend(m_obj, {'title':obj});
		obj = {};
	}else if(obj)
		m_obj = $.extend(m_obj, obj);
	
	box_name = $.trim(box_name);
	
	if(box_name){
		var lightbox_temp = $('#lightbox_temp');
		if (lightbox_temp.length) {
			lightbox_temp.dialog('close').html('<center><span c="loading"></span></center>');
		}else{
			$('body').append('<div id="lightbox_temp"><center><span id="loading"></span></center></div>');
			lightbox_temp = $('#lightbox_temp');
		}
		
		var url = '';
		m_obj.title = false;
		lightbox_temp.dialog(m_obj);
		if(box_name.indexOf('<') === 0){//html
			lightbox_temp.html(box_name);
			return;
		}else if(box_name.indexOf('/') === 0){//ajax controller
			url = box_name;
		}else{//ajax view
			url = '/modpub/lightbox/'+box_name;
		}
		
		lightbox_temp.load(url,obj,function(){
			if (onsuccessfn){
				onsuccessfn();
			}
			
			lightbox_temp.dialog('option','position','center');
			if (obj && obj.showScrollbar === true)
				lightbox_temp.css('overflow-y','scroll');
				
			$('textarea:visible,input[type=text]:visible,select:visible',lightbox_temp).first().focus();
		});
	
	}else{
		alert('You must specify lighbox name');
		return;
	}
}