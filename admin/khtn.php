<?php // Config
$tableCategoryConfig = 'tbl_product';
$tableConfig         = 'tbl_product';
$actConfig           = 'tbl_product';
?>

<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		@$result = mysql_query("delete from ".$tableConfig." where id='".$id."'",$conn);
		if ($result) $errMsg = 'Đã xóa thành công.';
		else $errMsg = 'Không thể xóa dữ liệu !';
		break;
}

if (isset($_POST['btnDel'])) {
	$cnt=0;
	if($_POST['chk']!=''){
		foreach ($_POST['chk'] as $id){
			@$result = mysql_query("delete from ".$tableConfig." where id='".$id."'",$conn);
			if ($result) $cnt++;
		}
		$errMsg = 'Ðã xóa '.$cnt.' phần tử.';
	}else{
		$errMsg = 'Hãy chọn trước khi xóa !';
	}
}

$page = $_GET['page'];
$p=0;
if ($page!='') $p=$page;
$where='1=1'?>
<form method="POST" action="./" name="frmForm" enctype="multipart/form-data">
<input type=hidden name="page" value="<?php echo $page?>">
<input type="hidden" name="act" value="<?php echo $actConfig?>">


<?php if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>

<table cellspacing="0" cellpadding="0" width="100%">
	
	<tr><td height="30"><center>Danh sách 10 khách hàng tiềm năng nhất</center></td></tr>

</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%">
	<tr>
		<!-- <th width="20" class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></th>
		<th class="title" colspan="2" nowrap></th> -->
		<th width="200" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Tên khách hàng</a></th>
		<th width="100" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Số điệnthoại</a></th>
		<th width="150" class="title"><a class="title" href="<?php echo getLinkSort(3)?>">Email</a></th>
		<th width="300" class="title"><a class="title" href="<?php echo getLinkSort(4)?>">Địa chỉ</a></th>
		<th width="134" class="title"><a class="title" href="<?php echo getLinkSort(5)?>">Số tiền đã mua hàng</a></th>
	<!-- 	<th width="133" class="title"><a class="title" href="<?php echo getLinkSort(6)?>">Lần hiệu chỉnh trước</a></th> -->
		
	</tr>
  
<?php $sortby = 'order by date_added';
if ($_REQUEST['sortby']!='') $sortby='order by '.(int)$_REQUEST['sortby'];
$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?'desc':'');

$sql="select *, SUM(total_money) from tbl_order group by guest_name,guest_tel order by SUM(total_money) DESC limit 10";
$result=mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_array($result)){
	
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5'?>
  
	<tr>
		
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_tel']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_email']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['guest_add']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo number_format($row['SUM(total_money)'],0,',','.')?></td>

		
		
	</tr>
<?php }
?>
</table>

<input type="submit" value="Xóa chọn" name="btnDel" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">

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
	<!-- <tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.countRecord($tableConfig).'</b>'?></td></tr> -->
</table>