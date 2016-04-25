<?php // Config
$tableCategoryConfig = 'tbl_product';
$tableConfig         = 'tbl_product';
$actConfig           = 'product_km';
?>

<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		@$result = mysql_query("update tbl_product  set km = 0 where id='".$id."'",$conn);
		if ($result) $errMsg = 'Đã xóa thành công.';
		else $errMsg = 'Không thể xóa dữ liệu !';
		break;
}

if (isset($_POST['btnDel'])) {
	$cnt=0;
	if($_POST['chk']!=''){
		foreach ($_POST['chk'] as $id){
			@$result = mysql_query("update tbl_product  set km = 0 where id='".$id."'",$conn);
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
$where='1=1 and km >0'?>
<form method="POST" action="./" name="frmForm" enctype="multipart/form-data">
<input type=hidden name="page" value="<?php echo $page?>">
<input type="hidden" name="act" value="<?php echo $actConfig?>">
<?php $pageindex = createPage(countRecord($tableConfig,$where),"./?act=".$actConfig."&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page)?>

<?php if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>

<table cellspacing="0" cellpadding="0" width="100%">
	<tr><td height="30" class="smallfont">Trang : <?php echo $pageindex?></td></tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></th>
		<th class="title" colspan="2" nowrap></th>

		<th width="100" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Mã S&#7843;n ph&#7849;m</a></th>
		<th width="250" class="title"><a class="title" href="<?php echo getLinkSort(2)?>">Tên S&#7843;n ph&#7849;m</a></th>
		<th width="80" class="title"><a class="title" href="<?php echo getLinkSort(3)?>">Phần trăm khuyến mại</a></th>
		<th width="75" class="title"><a class="title" href="<?php echo getLinkSort(4)?>">Giá cũ</a></th>
		<th width="134" class="title"><a class="title" href="<?php echo getLinkSort(5)?>">Giá mới</a></th>

		
	</tr>
  
<?php $sortby = 'order by date_added';
if ($_REQUEST['sortby']!='') $sortby='order by '.(int)$_REQUEST['sortby'];
$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?'desc':'');

$sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from $tableConfig where km > 0 $sortby $direction limit ".($p*$MAXPAGE).",".$MAXPAGE;
$result=mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_array($result)){
	$pro = getRecord($tableCategoryConfig,'id='.$row['id']);
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5'?>
  
	<tr>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center">
			<input type="checkbox" name="chk[]" value="<?php echo $row['id']?>">
		</td>
		<td width="29" align="center" bgcolor="<?php echo $color?>" class="smallfont">
			<a href="./?act=product_km_m&id=<?php echo $row['id']?>&page=<?php echo $page?>">Sửa</a>		</td>		
		<td width="30" align="center" bgcolor="<?php echo $color?>" class="smallfont">
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" 
				href="./?act=<?php echo $actConfig?>&action=del&page=<?php echo $_REQUEST['page']?>&id=<?php echo $row['id']?>">Xóa</a>		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $pro['code']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $pro['name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['km']?>%</td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo number_format($row['price'],0,',','.')?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo number_format($row['price']*(100-$row['km'])/100,0,',','.')?></td>
		
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
	<tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.countRecord($tableConfig, "km > 0").'</b>'?></td></tr>
</table>