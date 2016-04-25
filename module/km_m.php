<?php $row = getRecord("tbl_km", "id=".$_REQUEST['id'])?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="22" style="padding-left:5px; padding-top:5px">
		<span style="font-family:Tahoma; font-size:14px; color:#333333; font-weight:600"><?php echo $row['name']?></span></td></tr>	
	<tr>
		<td>
			<?php if($row['image']){
				$img = $row['image'];
			?><?php }?>
			<br/>
			<br />
			<?php echo $row['content']?>
	  </td>
	</tr>
	<tr><td height="10px"></td></tr>
	<tr><td align="right" style="padding-right:5px"><a href="javascript:history.go(-1);">
	<span style="font-family:Tahoma; color:#999999; font-size:12px; font-weight:600; text-decoration:none">[Quay lại]</span></a></td></tr>	
</table>
<br />
<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0" class="style27">	
	<tr><td height="10px"></td></tr>
</table>

