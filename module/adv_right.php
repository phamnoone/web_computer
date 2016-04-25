<link href="../css/css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php $code = $_lang=='vn' ? "vn_logo" : "en_logo";
$sql = "select * from tbl_adv where status=0 ";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
	if($row['image']!=''){
?>

<tr>
  <td align="center"><a href="<?php echo $row['code']?>" target="_blank">
  	<img border="0" src="<?php echo $row['image']?>" height="100px"></a></td>
</tr>
<?php }
}
?>
</table>