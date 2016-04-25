<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtName.value)){
		alert('Hãy nhập "họ tên" !');document.frmForm.txtName.focus();return false;
	}
	if(test_empty(document.frmForm.txtAddress.value)){
		alert('Hãy nhập "địa chỉ" !');document.frmForm.txtAddress.focus();return false;
	}
	
	if(test_empty(document.frmForm.txtTel.value)){
		alert('Hãy nhập "số điện thoại" !');document.frmForm.txtTel.focus();return false;
	}
	if(test_integer(document.frmForm.txtTel.value)){
		alert('"Số điện thoại" phải là số !');document.frmForm.txtTel.focus();return false;
	}
	if(test_empty(document.frmForm.txtEmail.value)){
		alert('Hãy nhập "hộp thư" !');document.frmForm.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmForm.txtEmail.value)){
		alert('"Hộp thư" không đúng định dạng !');document.frmForm.txtEmail.focus();return false;
	}
	if(test_empty(document.frmForm.txtUid.value)){
		alert('Hãy nhập "tên đăng nhập" !');document.frmForm.txtUid.focus();return false;
	}
	if(test_empty(document.frmForm.txtPwd.value)){
		alert('Hãy nhập "mật khẩu" !');document.frmForm.txtPwd.focus();return false;
	}
	if(test_empty(document.frmForm.txtPwd2.value)){
		alert('Hãy nhập "mật khẩu" lần 2 !');document.frmForm.txtPwd2.focus();return false;
	}
	if(!test_confirm_pass(document.frmForm.txtPwd.value,document.frmForm.txtPwd2.value)){
		alert('Hai mật khẩu phải đồng nhất !');
		document.frmForm.txtPwd.value = '';
		document.frmForm.txtPwd2.value = '';
		document.frmForm.txtPwd.focus();return false;
	}
	return true;
}
</script>

<?php $errMsg =''?>
<?php if (isset($_POST['btnSave'])){
	$name       = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	$address    = isset($_POST['txtAddress']) ? trim($_POST['txtAddress']) : '';
	$tel        = isset($_POST['txtTel']) ? trim($_POST['txtTel']) : '';
	$email      = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : '';
	$uid        = isset($_POST['txtUid']) ? trim($_POST['txtUid']) : '';
	$pwd        = isset($_POST['txtPwd']) ? trim($_POST['txtPwd']) : '';

	if (!empty($_POST['id'])){
		$oldid = $_POST['id'];
		$arrField = array(
			"name"          => "'$name'",
			"address"       => "'$address'",
			"tel"           => "'$tel'",
			"email"         => "'$email'",
			"uid"           => "'$uid'",
			"pwd"           => "'$pwd'",
		);
		$result = update("tbl_member",$arrField,"id=".$oldid);
	}else{
		$arrField = array(
			"name"          => "'$name'",
			"address"       => "'$address'",
			"tel"           => "'$tel'",
			"email"         => "'$email'",
			"uid"           => "'$uid'",
			"pwd"           => "'$pwd'",
		);
		$result = insert("tbl_member",$arrField);
	}
	if($result){
		echo "<script>window.location='./?act=member&code=1'</script>";
	}
	
	
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_member where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$name          = $row['name'];
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

<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="act" value="member_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td>
    		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
        		
				<tr>
        			<td width="15%" class="smallfont" align="right">Họ và tên</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">&#272;&#7883;a ch&#7881;</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $address?>" type="text" name="txtAddress" class="textbox" size="60">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">&#272;i&#7879;n tho&#7841;i</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $tel?>" type="text" name="txtTel" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">H&#7897;p th&#432;</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $email?>" type="text" name="txtEmail" class="textbox" size="34">
					</td>
      			</tr>
			
				<tr>
        			<td width="15%" class="smallfont" align="right">Tên &#273;&#259;ng nh&#7853;p</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $uid?>" type="text" name="txtUid" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">M&#7853;t kh&#7849;u</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $pwd?>" type="password" name="txtPwd" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">X&aacute;c nh&#7853;n m&#7853;t kh&#7849;u</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $pwd2?>" type="password" name="txtPwd2" class="textbox" size="34">
					</td>
      			</tr>
				
				
				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="submit" name="btnSave" VALUE="Cập nhật" class="button" onclick="return btnSave_onclick()">
						<input type="reset" class="button" value="Nhập lại">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>