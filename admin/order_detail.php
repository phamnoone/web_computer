<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		$sql = "delete from tbl_order_detail where id='".$id."'";
		$result = mysql_query($sql,$conn);
		echo mysql_error();
		if ($result) $errMsg = "Đã xóa thành công.";
			else $errMsg = "Không thể xóa dữ liệu !";
		break;
}

if (isset($_POST['btnDel'])){
	$cnt=0;
	$id = $_REQUEST['id'];
	$sql ="update tbl_order set status = 1 where id = ".$id;
	mysql_query($sql,$conn);
	$errMsg = "Đơn hàng ".$id." đã giao";
}
?>
<form method="POST" name="frmForm" action="./">
<input type="hidden" name="act" value="order_detail">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
	<?php $orderId=$_REQUEST['id'];
	if ($orderId=='') return;
	$orderinfo=getRecord("tbl_order","id=".$orderId);
	$cust=getRecord("tbl_order","id=".$orderId);
	?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">

	<tr><td class="3" height="10"></td></tr>
	<center><td class="smallfont" ><b>Thông tin khách hàng</b></td></center>

	<tr>
		<td width="15%" class="smallfont" align="right">Họ và tên:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['guest_name']?></b></td>
	</tr>
	<tr>
		<td width="15%" class="smallfont" align="right">Điện thoại:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['guest_tel']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">E-mail:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['guest_email']?></b></td>
	</tr>
	<tr>
		<td width="15%" class="smallfont" align="right">Địa chỉ:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['guest_add']?></b></td>
	</tr>


	<tr><td class="3" height="10"></td></tr>
	<center><td class="smallfont" ><b>Thông tin người nhận</b></td></center>

	<tr>
		<td width="15%" class="smallfont" align="right">Họ và tên:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['receiver_name']?></b></td>
	</tr>
	<tr>
		<td width="15%" class="smallfont" align="right">Điện thoại:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['receiver_tel']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">E-mail:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['receiver_email']?></b></td>
	</tr>
	<tr>
		<td width="15%" class="smallfont" align="right">Địa chỉ:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['receiver_add']?></b></td>
	</tr>

	<tr><td class="3" height="10"></td></tr>
	<tr><td class="3" height="10"></td></tr>
	<center><td class="smallfont" ><b>Thông tin đơn hàng</b></td></center>

	<tr>
		<td width="15%" class="smallfont" align="right">Hình thức giao hàng:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['httt']?></b></td>
	</tr>
	<tr>
		<td width="15%" class="smallfont" align="right">Thời gian giao hàng:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['date_delivery']?></b></td>
	</tr>

	<tr>
		<td width="15%" class="smallfont" align="right">Thời gian đặt hàng:</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['date_added']?></b></td>
	</tr>

	<center><td class="smallfont" ><b>Chi tiết danh sách sản phẩm</b></td></center>


</table>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>

		<!-- <th width="20" class="title"></th> -->
		<th class="title">Mã sản phẩm</th>
		<th class="title">Tên sản phẩm</th>
		<th class="title">Số lượng</th>
		<th class="title">Đơn giá</th>
		<th class="title">Thành tiền</th>    
	</tr>
  
<?php $page = $_GET["page"];
$sql="select * from tbl_order_detail where order_id=$orderId order by id";
$result=mysql_query($sql,$conn);
$i=0;


	$row_product=mysql_fetch_array($result_product);
while($row=mysql_fetch_array($result)){
	$pro=getRecord("tbl_product","id=".$row['product_id']);
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5';
	
?>

	<tr>
		
		
		<!-- <td bgcolor="<?php echo $color?>" class="smallfont">
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="./?act=order_detail&action=del&id=<?php echo $row['id']?>">Xóa</a>
		</td> -->
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $pro['id']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $pro['name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['quantity']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php echo number_format($pro['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php echo number_format($row['quantity']*$pro['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>

	</tr>

<?php }
?>

</table >

<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
	<tr><td height="10"></td></tr>
	<center><input  type="submit" value="Đánh dấu là đã giao hàng" name="btnDel"  class="button"></form></center>

	<tr><td class="smallfont"><?php echo 'Tổng số sản phẩm : <b>'.countRecord('tbl_order_detail','order_id='.$_REQUEST['id']).'</b>'?></td></tr>
</table>