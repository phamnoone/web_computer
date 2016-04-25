<script language="javascript">
function btnRegistry_onclick(){
	if(test_empty(document.frmRegistry.txtName.value)){
		alert(mustInput_Name);document.frmRegistry.txtName.focus();return false;
	}

	if(test_empty(document.frmRegistry.txtAddress.value)){
		alert(mustInput_Address);document.frmRegistry.txtAddress.focus();return false;
	}

	if(test_empty(document.frmRegistry.txtTel.value)){
		alert(mustInput_Tel);document.frmRegistry.txtTel.focus();return false;
	}
	if(test_integer(document.frmRegistry.txtTel.value)){
		alert(mustInterger_Tel);document.frmRegistry.txtTel.focus();return false;
	}
	if(test_empty(document.frmRegistry.txtEmail.value)){
		alert(mustInput_Email);document.frmRegistry.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmRegistry.txtEmail.value)){
		alert(invalid_Email);document.frmRegistry.txtEmail.focus();return false;
	}
	if(test_empty(document.frmRegistry.txtUid.value)){
		alert(mustInput_Uid);document.frmRegistry.txtUid.focus();return false;
	}
	if(!test_length4(document.frmRegistry.txtUid.value)){
		alert(mustLength4_Uid);document.frmRegistry.txtUid.focus();return false;
	}
	if(test_empty(document.frmRegistry.txtPwd.value)){
		alert(mustInput_Pwd);document.frmRegistry.txtPwd.focus();return false;
	}
	if(!test_length4(document.frmRegistry.txtPwd.value)){
		alert(mustLength4_Pwd);document.frmRegistry.txtPwd.value = '';document.frmRegistry.txtPwd.focus();return false;
	}
	if(test_empty(document.frmRegistry.txtPwd2.value)){
		alert(mustInput_Pwd2);document.frmRegistry.txtPwd2.focus();return false;
	}
	if(!test_length4(document.frmRegistry.txtPwd2.value)){
		alert(mustLength4_Pwd);document.frmRegistry.txtPwd2.value = '';document.frmRegistry.txtPwd2.focus();return false;
	}
	if(!test_confirm_pass(document.frmRegistry.txtPwd.value,document.frmRegistry.txtPwd2.value)){
		alert(identicalPassword);
		document.frmRegistry.txtPwd.value = '';
		document.frmRegistry.txtPwd2.value = '';
		document.frmRegistry.txtPwd.focus();return false;
	}
	if(test_empty(document.frmRegistry.txtRobust.value)){
		alert(mustInput_Robust);document.frmRegistry.txtRobust.focus();return false;
	}
	return true;
}
</script>
<?php $alphanum  = "abcdefghijlmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$rand = substr(str_shuffle($alphanum), 0, 5);
$randE = PKI_Encrypt($rand, 6733, 82393793)?>

<?php $errMsg =''?>
<?php $l_Request     = $_lang == 'vn' ? 'Thông tin phải nhập' : 'Request info';
$l_PerInfo     = $_lang == 'vn' ? 'Thông tin cá nhân' : 'Personal info';
$l_AddressInfo = $_lang == 'vn' ? 'Địa chỉ' : 'Address info';
$l_ContactInfo = $_lang == 'vn' ? 'Thông tin liên hệ' : 'Contact info';
$l_UserInfo    = $_lang == 'vn' ? 'Tên truy cập & mật khẩu' : 'User info';
$l_strConfirm  = $_lang == 'vn' ? 'Chuỗi xác nhận' : 'Confirm string';

$l_Name        = $_lang == 'vn' ? 'Họ và tên' : 'Full name';
$l_Address     = $_lang == 'vn' ? 'Địa chỉ' : 'Address';
$l_Tel         = $_lang == 'vn' ? 'Điện thoại' : 'Tel';
$l_Email       = $_lang == 'vn' ? 'Email' : 'Email';
$l_Website     = $_lang == 'vn' ? 'Trang web' : 'Website';
$l_Uid         = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_Pwd         = $_lang == 'vn' ? 'Mật khẩu' : 'Password';
$l_Pwd2        = $_lang == 'vn' ? 'Nhập lại mật khẩu' : 'Confirm password';
$l_strR        = $_lang == 'vn' ? 'Chuỗi xác nhận' : 'Confirm string';


$l_btnRegistry = $_lang == 'vn' ? 'Đăng ký' : 'Registry';
$l_btnReset    = $_lang == 'vn' ? 'Nhập lại' : 'Reset';

$l_RegSuccess  = $_lang == 'vn' ? 'Đã đăng ký thành công.' : 'Registry Successfully.';

$l_min4char    = $_lang == 'vn' ? 'tối thiểu 4 ký tự' : 'Min 4 characters';

if (isset($_POST['btnRegistry'])){
	$name       = trim($_POST['txtName']);
	$address    = trim($_POST['txtAddress']);
	$tel        = trim($_POST['txtTel']);
	$email      = trim($_POST['txtEmail']);
	$uid        = trim($_POST['txtUid']);
	$pwd        = trim($_POST['txtPwd']);
	$Rdx        = isset($_POST['HidRd']) ? trim($_POST['HidRd']) : "";
	$strRobust  = isset($_POST['txtRobust']) ? trim($_POST['txtRobust']) : "";
	if (1){
		//md5($strRobust) == $Rdx
		$uidTest = getRecord("tbl_member","uid='".$uid."'");
		if($uidTest['uid']==$uid){
			$errMsg = '"Tên đăng nhập" này đã tồn tại. Hãy chọn tên khác !';
		}else{
			$fields_arr = array(
				"name"          => "'$name'",
				"address"       => "'$address'",
				"tel"           => "'$tel'",
				"email"         => "'$email'",
				"uid"           => "'$uid'",
				"pwd"           => "'$pwd'",
			);
			
			$result = insert("tbl_member",$fields_arr);
			if($result) {
				$_SESSION['member'] = $uid;
				echo "<script>window.location='./?frame=registry&code=1'</script>";
			}
		}
	}else{
		$errMsg = 'Sai "Chuỗi xác nhận" !';
	}
}
if ($_REQUEST['code']=='1'){
?>

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>
			<table align="center" border="1" width="100%" cellpadding="0" border  cellspacing="0" style="border-collapse:collapse">
				<tr>
					<td align="center">
						<br><br>
						<font   size="2" face="Verdana, Arial, Helvetica, sans-serif">
						<b><?php echo $l_RegSuccess?></b>
						</font>
						<br><br>
						[ <a href="./"><?php echo $_lang=='vn'?'Kích vào đây để trở về trang chủ !.':'Login'?></a> ]
						<br><br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>

<?php }else{
?>

<form method="POST" name="frmRegistry" action="./">
<input type="hidden" name="frame" value="registry">
<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse" bordercolor="#CCCCCC">
				<tr>
					<td align="center">

<table border="0" cellspacing="5" cellpadding="0" width="100%" align="center">
	<tr>
		<td height="20" colspan="3" class="normalfont" align="right">
			<font color="#FF0000">* </font><font  ><?php echo $l_Request?>&nbsp;&nbsp;&nbsp;</font>
		</td>
	</tr>

	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_PerInfo?></b><HR size="1" noshade></td></tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Name?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtName" value="<?php echo $name?>"></td>
	</tr>
	
	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_AddressInfo?></b><HR size="1" noshade></td></tr>


	<tr>
		<td align="right" class="normalFont"><?php echo $l_Address?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtAddress" value="<?php echo $address?>"></td>
	</tr>

	
	
	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_ContactInfo?></b><HR size="1" noshade></td></tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Tel?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtTel" value="<?php echo $tel?>"></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Email?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtEmail" value="<?php echo $email?>"></td>
	</tr>

	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_UserInfo?></b><HR size="1" noshade></td></tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Uid?></td>
		<td class="Star"><font color="#FF0000">*</font></td>
		<td>
			<input class="textbox" size="30" name="txtUid" value="<?php echo $uid?>">
			<font  >(<?php echo $l_min4char?>)</font>
		</td>
	</tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Pwd?></td>
		<td><font color="#FF0000">*</font></td>
		<td>
			<input class="textbox" size="30" name="txtPwd" type="password">
			<font  >(<?php echo $l_min4char?>)</font>
		</td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Pwd2?></td>
		<td class="Star"><font color="#FF0000">*</font></td>
		<td>
			<input class="textbox" size="30" name="txtPwd2" type="password">
			<font  >(<?php echo $l_min4char?>)</font>
		</td>
	</tr>
	
	<!-- <tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_strConfirm?></b><HR size="1" noshade></td></tr>
	
	<tr>
		<td align="right" class="normalFont"></td>
		<td class="Star"></td>
		<td>
			<input type="hidden" name="HidRd" id="HidRd" value="<?php print( md5($rand)) ?>">
			<img name="robust" src= "<?php print('lib/RD_Img.php?RD='.$randE) ?>" border="1" style="border-color:#999999; border-collapse:collapse">
		</td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_strR?></td>
		<td class="Star"></td>
		<td>
			<input class="textbox" size="30" name="txtRobust" type="text"> 
		</td>
	</tr>
	
	<tr><td height="20" colspan="3" class="normalTitle"><HR size="1" noshade></td></tr>

	<tr>
		<td colspan="2"></td>
		<td></td>
	</tr> -->

	<tr>
		<td colspan="2"></td>
		<td>
			<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 22px" onmouseout="this.className='buttonorange'" type="submit" value="<?php echo $l_btnRegistry?>" name="btnRegistry" onclick="return btnRegistry_onclick()">
			<input type=reset class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 22px" onmouseout="this.className='buttonorange'" name=butReset value="<?php echo $l_btnReset?>">
		</td>
	</tr>
	
	<tr><td colspan="3" height="10"></td></tr>
</table>

					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>
</form>

<?php }?>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>