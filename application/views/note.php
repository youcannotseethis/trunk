<div style='width:100%;'>
<h1>Note</h1>
 <table class="table table-hover">
    <tr class="info" style='width:500px;'>
      <td style='width:500px; float:left;'><?php
echo $note['text_body'] . " #" . $note['keyword'];
?></td>
    </tr>
    <tr class="info" style='width:500px;'>
      <td style='width:283px; float:left;'>by <a href='user?uid=<?php
echo $note_author['uid'];
?>' > <?php
echo $note_author['first_name'] . " " . $note_author['last_name'];
?></a></td> 
	  <td style='width:200px; float:left;'>at <a href='place?pid=<?php
echo $place['pid'];
?>'><?php
echo $place['pname'];
?></a></td> 
    </tr>
</table>
<br>
<table class="table table-hover">
	<?php
$index = 1;
foreach ($reply as $row) {
?>
	<tr class="success"  style='width:600px; float:left;'>
	    <td style='width:10px; float:left;'><?php
    echo $index;
    $index += 1;
?></td>
	    <td style='width:500px; float:left;'><?php
    echo $row['reply_body'];
?></td> 
	  </tr>
	<?php
}
?>
</table>
</div>
