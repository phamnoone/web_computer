<style type="text/css">
	.err{
		font-family:Tahoma;
		font-size:12px;
		color:#FF0000;
		font-weight:600;
	}
</style>

<script language="javascript">
function btnSend_onclick(){
	if(test_empty(document.frmContact.txtName.value)){
		alert(mustInput_Name);document.frmContact.txtName.focus();return false;
	}
	if(test_empty(document.frmContact.txtEmail.value)){
		alert(mustInput_Email);document.frmContact.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmContact.txtEmail.value)){
		alert(invalid_Email);document.frmContact.txtEmail.focus();return false;
	}
	
	
	return true;
}

</script>

<?php $errMsg =''?>

<?php $l_sao      = $_lang == 'vn' ? 'Thông tin phải nhập' : 'Request info';
$l_hoten    = $_lang == 'vn' ? 'Họ và tên' : 'Full name';


$l_diachi   = $_lang == 'vn' ? 'Địa chỉ' : 'Address';
$l_email    = $_lang == 'vn' ? 'E-mail' : 'E-mail';

$l_dt       = $_lang == 'vn' ? 'Điện thoại' : 'Tel';

$l_noidung  = $_lang == 'vn' ? 'Nội dung liên hệ' : 'Content';
$l_nutgoi   = $_lang == 'vn' ? 'Gởi thông tin' : 'Send';
$l_nutxoa   = $_lang == 'vn' ? 'Nhập lại' : 'Reset';

if (isset($_POST['btnSend'])){

	$name      = trim($_POST['txtName']);
	
	$address   = trim($_POST['txtAddress']);
	$email     = trim($_POST['txtEmail']);
	
	$tel       = trim($_POST['txtTel']);
	$mobile    = trim($_POST['txtMobile']);

	$detail    = trim($_POST['txtDetail']);
	
	$errMsg = $_lang == 'vn' ? "Thông tin liên hệ của Quý khách đã được gởi. Chúng <br/>Tôi sẽ trả lời trong thời gian sớm nhất!. Xin cảm ơn." : "Your e-mail have been send to us. We will reply within 24 hours. Many thanks.";
}



?>

	



<table align="center" width="98%" cellpadding="0" cellspacing="0">	
	<tr>
		<td style="padding-top:10px">
			<?php $code = $_lang == 'vn' ? 'vn_contact' : 'en_contact';
			$contact = getRecord("tbl_content","parent = (select id from tbl_content_category where code='$code')");
			echo $contact['detail_short']?>
		</td>
	</tr>	
</table>
<form method="POST" name="frmContact" action="./">
<input type="hidden" name="frame" value="contact">
<table align="center" width="95%" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" align="right" style="padding-right:0px">
		<font color="#ff0000"> * </font> <strong><?php echo $l_sao?></strong>
		</td>
	</tr>
	<tr><td align="center" style="padding-right:80px"><?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?></td></tr>	
	<tr><td height="10px"></td></tr>
	<tr>
		<td>

<table border="0" width="100%" cellspacing="1" cellpadding="0" style="border-collapse:collapse">

	<tr>

		<td width="30%" align="right" class="normalFont"><font color="#FF0000">*</font> <?php echo $l_hoten?> : </td>

		<td>&nbsp;<input class="textbox" size=30 name="txtName" value="<?php echo $name?>"></td>

	</tr>

	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_diachi?> : </td>
		<td>&nbsp;<input class="textbox" size=30 name="txtAddress" value="<?php echo $address?>"></td>
	</tr>

	<tr>
		<td align="right" class="normalFont"><font color="#FF0000">*</font> <?php echo $l_email?> : </td>
		<td>&nbsp;<input class="textbox" size=30 name="txtEmail" value="<?php echo $email?>"></td>
	</tr>
	
	

	<tr>
		<td align="right" class="normalFont"><?php echo $l_dt?> : </td>
		<td>&nbsp;<input class="textbox" size=30 name="txtTel" value="<?php echo $tel?>"></td>
	</tr>
	
	<tr>
	   <td align="right" class="normalFont"><font color="#FF0000">*</font> <?php echo $l_noidung?> &nbsp;</td>
		<td>&nbsp;<textarea class="textbox" name="txtDetail" rows="7" cols="25"></textarea></td>
	</tr>
</table>		
		</td>
	</tr>
	<tr><td height="10px"></td></tr>
	<tr>
		<td align="center">

			&nbsp;<input class="buttonOrange" onmouseover="this.className='buttonBlue'" onmouseout="this.className='buttonOrange'" type="submit" value="<?php echo $l_nutgoi?>" name="btnSend" style="height: 22px; width:100px" onclick="return btnSend_onclick()">

			&nbsp;<input class="buttonOrange" onmouseover="this.className='buttonBlue'" onmouseout="this.className='buttonOrange'" type="reset" value="<?php echo $l_nutxoa?>" name="btnReset" style="height: 22px; width:80px">

		</td>

	</tr>
</table>
</form>

