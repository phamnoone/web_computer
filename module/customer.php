<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtFullname.value)){
		alert('Hãy nhập "Họ tên" !');document.frmForm.txtFullname.focus();return false;
	}
	if(test_empty(document.frmForm.txtAddress.value)){
		alert('Hãy nhập "Địa chỉ" !');document.frmForm.txtAddress.focus();return false;
	}
	
	if(test_empty(document.frmForm.txtTel.value)){
		alert('Hãy nhập "Số điện thoại" !');document.frmForm.txtTel.focus();return false;
	}
	if(test_empty(document.frmForm.txtEmail.value)){
		alert('Hãy nhập "E-mail" !');document.frmForm.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmForm.txtEmail.value)){
		alert('"E-mail" không đúng định dạng !');document.frmForm.txtEmail.focus();return false;
	}
	return true;
}
</script>

</head>
<body>
<?php $errMsg="";
if (isset($_POST['butSub'])) {

	$fullname	=	trim($_POST['txtFullname']);
	$address	=	trim($_POST['txtAddress']);
	$tel		=	trim($_POST['txtTel']);
	$email		=	trim($_POST['txtEmail']);
	$fullname2	=	trim($_POST['txtFullname2']);
	$address2	=	trim($_POST['txtAddress2']);
	$tel2		=	trim($_POST['txtTel2']);
	$email2		=	trim($_POST['txtEmail2']);
	$httt   = 	trim($_POST['httt']);
	$date 	=  trim($_POST['txtDate']);
	
	if ($errMsg=='')
	{
		$cust = array();
		$cust['name'] 		=  $fullname;
		$cust['address'] 	=  $address;		
		$cust['tel'] 		=  $tel;
		$cust['email'] 		=  $email;

		$cust['name2'] 		=  $fullname2;
		$cust['address2'] 	=  $address2;		
		$cust['tel2'] 		=  $tel2;
		$cust['email2'] 	=  $email2;	

		$cust['httt'] 	=  $httt;	
		$cust['date'] 	=  $date;	

		$_SESSION['cust'] 	=  $cust;
		echo "<script>window.location='./?frame=checkout'</script>";
	}

} else {
	if(!(!isset($_SESSION['member']) || $_SESSION['member']=='')){
                  $sql = "select * from tbl_member where uid='". $_SESSION['member']."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$fullname          = $row['name'];
			$address       = $row['address'];
			$tel           = $row['tel'];
			$email         = $row['email'];
			$uid           = $row['uid'];
			$pwd           = $row['pwd'];
			$pwd2          = $row['pwd'];
		}          
                         
	}
	
}

?>

<?php if ($_REQUEST['code']=='1') {
   		echo "<p class='err'>Đăng ký thành công !.<br><br>";
   		echo "<a href='./?frame=cart'>Nhấn vào đây xem giỏ hàng của bạn !.</a></p>";
   }
   else
   {
?>
<div align="center">            
<table border="0" cellspacing="5" cellpadding="0" width="526" align="center" bordercolor="#000000">
<form method="POST" name="frmForm" action="./">
<tr>
	<td height="20" colspan="3" align="center" class="err" style="padding-top:5px">
		<span style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#FF6600">
			<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?></span>
   </td>
</tr>
<tr>
<td height="20" colspan="3" style="padding-right:10px">
   <p align="right"> <font color="#FF0000">* </font>&nbsp;
   	<span style="color:#000000; font-family:Tahoma; font-size:12px"><strong>Thông tin phải nhập</strong> </span></td>
</tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Thông tin khách hàng</b><HR size="1" noshade></td>
</tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Họ và tên</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT  class="fieldKey" size=33 name="txtFullname" value="<?php echo $fullname?>"></td>
<tr>
<td align="right" class="normalfontbold" width="40%">Địa chỉ</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtAddress" value="<?php echo $address?>"></td>
</tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Điện thoại</td>
<td width="5"><font color="#FF0000">*</font></td>
<td width="60%"><input class="fieldKey" size=33 name="txtTel" value="<?php echo $tel?>" /></td>
</tr>

<tr>
<td align="right" class="normalfontbold" width="40%">E-mail</td>
<td width="5"> <font color="#FF0000">*</font></td>
<td nowrap width="60%"> <INPUT class="fieldKey" size=33 name="txtEmail" value="<?php echo $email?>"></td>

<td colspan="2" height="10px"></td><td width="60%" height="10px"></td>
</tr>


</tr>

<tr><td colspan="3" height="5px"></td></tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Thông tin giao hàng</b><HR size="1" noshade></td>

<tr>
<td align="right" class="normalfontbold" width="40%">Họ và tên</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT  class="fieldKey" size=33 name="txtFullname2" value="<?php echo $fullname?>"></td>
<tr>
<td align="right" class="normalfontbold" width="40%">Địa chỉ</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtAddress2" value="<?php echo $address?>"></td>
</tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Điện thoại</td>
<td width="5"><font color="#FF0000">*</font></td>
<td width="60%"><input class="fieldKey" size=33 name="txtTel2" value="<?php echo $tel?>" /></td>
</tr>

<tr>
<td align="right" class="normalfontbold" width="40%">E-mail</td>
<td width="5"> <font color="#FF0000">*</font></td>
<td nowrap width="60%"> <INPUT class="fieldKey" size=33 name="txtEmail2" value="<?php echo $email?>"></td>

<td colspan="2" height="10px"></td><td width="60%" height="10px"></td>
</tr>
</tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Hình thức thanh toán</b><HR size="1" noshade></td>
</tr>
<td align="right" class="normalfontbold" width="40%"></td>
<td width="5"> <font color="#FF0000">*</font></td>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px">

<select name="httt">
    <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
    <option value="Thanh toán tại nơi giao hàng">Thanh toán tại nơi giao hàng</option>
    <option value="Thanh toán bằng chuyển khoản">Thanh toán bằng chuyển khoản</option>
    <option value="Chuyển khoản InternetBanking">Chuyển khoản InternetBanking</option>
    <option value="	Thanh toán bằng tài khoản Bảo Kim">	Thanh toán bằng tài khoản Bảo Kim</option>
</select>
</td>
</tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Ngày giao hàng</b><HR size="1" noshade></td>
</tr>

<tr>
<td align="right" class="normalfontbold" width="40%">Ngày giao hàng(yyyy-mm-dd)</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT  class="fieldKey" size=33 name="txtDate" value="<?php echo $fullname?>"></td>
<tr>
</td>
<tr><td colspan="3" height="5px"></td></tr>
<tr>
<td colspan="2">&nbsp;</td>
<td width="60%"><input class="buttonorange" onMouseOver="this.className='buttonblue'" style="WIDTH: 189px; HEIGHT: 22px" onMouseOut="this.className='buttonorange'" type="submit" value="Xác nhận đơn hàng" name="butSub" onClick="return btnSave_onclick();"></td>
</tr>
<tr><td colspan="2">&nbsp;</td><td width="60%">&nbsp;</td></tr>
<input type="hidden" name="frame" value="customer">
</form>	
</table>
</div>
<?php }
?>