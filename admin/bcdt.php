<?php // Config
$tableCategoryConfig = 'tbl_product';
$tableConfig         = 'tbl_product';
$actConfig           = 'tbl_product';
?>

<?php $errMsg =''?>
<?php 
$where = '';

	// echo "WHERE OrderDate BETWEEN #07/04/1996# AND #07/09/1996#;";

if(isset($_POST['submit'])) {
    // form submitted, now we can look at the data that came through
    // the value inside the brackets comes from the name attribute of the input field. (just like submit above)
    $username = $_POST['bdau'];
    $where = "where date_added BETWEEN '".$_POST['bdau']."' AND '".$_POST['kthuc']."'";
    $date = "từ ngày : ".$_POST['bdau']." đến ngày : ".$_POST['kthuc'];
    // Now you can do whatever with this variable.
}

?>

<form method="POST" action="" enctype="multipart/form-data">
<table cellspacing="0" cellpadding="0" width="100%">
	
	<tr><td><br></td></tr>
	<tr>
		<td><center>Từ ngày : <input type="date" name="bdau"> Đến ngày: 
		<input type="date" name="kthuc">
		<input type="submit" name="submit" value="Thống kê" class="button"/><br/>
		</center>
		</td>
	
	</tr>	
	<tr><td height="30"><center>Thống kê doanh thu <?php echo $date?></center></td></tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%">
	<tr>
		<!-- <th width="20" class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></th>
		<th class="title" colspan="2" nowrap></th> -->
		<th width="100" class="title"><a class="title" href="<?php echo getLinkSort(1)?>">Ngày đặt hàng</a></th>
		<th width="200" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Tên khách hàng</a></th>
		<th width="100" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Số điện thoại</a></th>
		<th width="150" class="title"><a class="title" href="<?php echo getLinkSort(3)?>">Email</a></th>
		<th width="300" class="title"><a class="title" href="<?php echo getLinkSort(4)?>">Địa chỉ</a></th>
		<th width="134" class="title"><a class="title" href="<?php echo getLinkSort(5)?>">Số tiền đã mua hàng</a></th>
	<!-- 	<th width="133" class="title"><a class="title" href="<?php echo getLinkSort(6)?>">Lần hiệu chỉnh trước</a></th> -->
		
	</tr>
  
<?php


$sql="select * from tbl_order ".$where;

$result=mysql_query($sql,$conn);
$i=0;
$count = 0;
while($row=mysql_fetch_array($result)){
	
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5'?>
  
	<tr>
		
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['date_added']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_tel']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_email']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_add']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo number_format($row['total_money'],0,',','.')?></td>

		
		
	</tr>
<?php 
$count = $count + 1;
}
?>
</table>
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmForm;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmForm.chkall.checked;
		}
	}
}
</script>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
	<tr><td height="10"></td></tr>
	<tr><td class="smallfont"><center><?php echo 'Tổng số đơn hàng : <b>'.$count.'</b>'?></center></td></tr>
	<tr><td class="smallfont"><center><?php echo 'Tổng giá trị mặt hàng : ' ;
	
	$result=mysql_query("select SUM(total_money) from tbl_order ".$where,$conn);
	while($row=mysql_fetch_array($result)){
		echo "<b>".number_format($row['SUM(total_money)'],0,',','.')."</b";
	
	}
	?></center></td></tr>
</table>