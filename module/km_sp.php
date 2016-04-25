<?php 

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from tbl_km where status=0";

$result = @mysql_query($sql,$conn);

$total = countRecord("tbl_km","status=0 ");
if($total==0){
?>
<b>Đang cập nhật</b>
<?php }else{ 
	 while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
?>

	<a href="./?frame=km_m&id=<?php echo $row['id']?>" title="<?php echo $row['name']?>">
						<img src="<?php echo $row['image']?>" width="1000" height="200" border="0" /></a>

<?php }
}
?>