<?php $errMsg =''

?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		if (countRecord('tbl_order_detail','order_id='.$id)>=0) {
			$sql = "delete from tbl_order where id='".$id."'";
			$result = mysql_query($sql,$conn);
			if ($result) $errMsg = "Đã xóa thành công.";
			else $errMsg = "Không thể xóa dữ liệu !";
		} else {
			$errMsg = "Đang có sản phẩm tồn tại trong đơn hàng nên bạn không thể xóa !";
		}
		break;
}
$where = '';
if (isset($_GET['value'])) {
	$where = " where status = 0 ";
}
?>
<form method="POST" name="frmForm" action="./">
<input type="hidden" name="act" value="order">
<input type=hidden name="page" value="<?php echo $page?>">
<?php $pageindex = createPage(countRecord("tbl_order","1=1"),'./?act=order"."&page=',$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
	<tr><td height="30" class="smallfont">Trang : <?php echo $pageindex?></td></tr>
	<tr><td height="30" class="smallfont">
	

	</td></tr>


</table>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></th>
		<th width="20" class="title"></th>
		<th width="20" class="title">ID</th>
		
		<th class="title"><a class="title" href="<?php echo getLinkSort(3)?>">Tên khách hàng</a></th>
		<th class="title">Tên người nhận</th> 
		<th class="title">Địa chỉ người nhận</th> 
		<th class="title">Số điện thoại người nhận</th> 
		<th class="title">Tổng tiền</th>
		<th class="title">Thời gian đặt hàng</th>
		<th class="title">Thời gian giao hàng</th>
		<th class="title">Hình thức thành toán</th> 
		<th class="title">Trạng thái</th>      
		<th class="title">Chi tiết</th>    
	</tr>
  
<?php $sortby = 'order by date_added';
if ($_REQUEST['sortby']!='') $sortby='order by '.(int)$_REQUEST['sortby'];
$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?'desc':'');

$sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y') as date_added from tbl_order ".$where." $sortby $direction limit ".($p*$MAXPAGE).",".$MAXPAGE;
$result=mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_array($result)){
	$cust = getRecord("tbl_member",'id='.$row['member_id']);
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5';
?>
  
	<tr>
		<td bgcolor="<?php echo $color?>" class="smallfont">
			<input type="checkbox" name="chk[]" value="<?php echo $row['id']?>">
		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont">
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="./?act=order&action=del&id=<?php echo $row['id']?>">Xóa</a>
		</td>
		
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['id']?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['guest_name']?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['receiver_name']?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['receiver_add']?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['receiver_tel']?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo number_format($row['total_money'])?></td>
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php echo $row['date_added']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['date_delivery']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['httt']?></td>
		
		<td bgcolor="<?php echo $color?>" align="center" class="smallfont">
			<?php 
				if ($row['status'] == '0') echo 'Đơn hàng mới tạo';
				if ($row['status'] == '1') echo 'Giao dịch thành công';
			?></td>
		
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center">
			<input type="button" name="butDetail" value="Xem chi tiết" class="button" onclick="javascript:window.location='./?act=order_detail&id=<?php echo $row['id']?>'"></td>
	</tr>
<?php }
?>
</table>

<input type="submit" value="Xóa chọn" name="ButDel" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
<input type="button" name="thanh" value="Thống kê đơn hàng chưa giao" class="button" onclick="javascript:window.location='./?act=order&value=1'"></td>
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
	<tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.countRecord('tbl_order').'</b>'?></td></tr>
</table>