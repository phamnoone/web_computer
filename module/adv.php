<link href="../css/css.css" rel="stylesheet" type="text/css" />


<?php $code = $_lang=='vn' ? "vn_advright_bottom" : "en_advright_bottom";
$sql = "select * from tbl_adv where status=0 ";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
	if($row['image']!=''){
?>


 <a href="<?php echo $row['address']?>" target="_blank">
  	<img border="0" src="<?php echo $row['image']?>" width="100%"></a><br>


<?php }
}
?>
