<script language="javascript">
function btnLogin_onclick(){
	if(test_empty(document.frmLogin.txtUid.value)){
		alert(mustInput_Uid);document.frmLogin.txtUid.focus();return false;
	}
	if(test_empty(document.frmLogin.txtPwd.value)){
		alert(mustInput_Pwd);document.frmLogin.txtPwd.focus();return false;
	}
	return true;
}
</script>

<?php $errMsg =''?>
<?php $l_notmember = $_lang == 'vn' ? 'Bạn chưa là thành viên' : 'Not member';
$l_member    = $_lang == 'vn' ? 'Bạn đã là thành viên' : 'Member';

$l_Uid       = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_Pwd       = $_lang == 'vn' ? 'Mật khẩu' : 'Password';
$l_ForgotPwd = $_lang == 'vn' ? 'Quên mật khẩu' : 'Forgot Password';

$l_btnRegistry = $_lang == 'vn' ? 'Đăng ký' : 'Registry';
$l_btnLogin    = $_lang == 'vn' ? 'Đăng nhập' : 'Login';
$l_btnLogout   = $_lang == 'vn' ? 'Đăng xuất' : 'Logout';

$l_Welcome      = $_lang == 'vn' ? 'Chào' : 'Welcome';
$l_LoginSuccess = $_lang == 'vn' ? 'Bạn đã đăng nhập thành công.' : 'Login Successfully.';

if ($_REQUEST['frame']=='logout'){
	unset($_SESSION['member']);
	echo "<script>window.location='./?frame=login'</script>";
}
if(!isset($_SESSION['member']) || $_SESSION['member']==''){
	$flagLogin = false;
}else{
	$flagLogin = true;
}

if($_REQUEST['boxUid']!=''){
	$uid = $_REQUEST['boxUid'];
	$pwd = $_REQUEST['boxPwd'];
	
	if(!isset($_SESSION['member']) || $_SESSION['member']==''){
		$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
		$rows = mysql_num_rows($result);
		if($rows<1){
			$errMsg = $_lang == 'vn'?'Sai "tên đăng nhập" !':'Username wrong !';
		}else{
			$row = mysql_fetch_array($result);
			if($pwd != $row['pwd']){
				$errMsg = $_lang == 'vn'?'Sai "mật khẩu" !':'Password wrong !';
			}else{
				$flagLogin = true;
			}
		}
	}
}

if (isset($_POST['btnLogin'])){
	$uid = isset($_POST['txtUid']) ? trim($_POST['txtUid']) : "";
	$pwd = isset($_POST['txtPwd']) ? trim($_POST['txtPwd']) : "";
	
	if(!isset($_SESSION['member']) || $_SESSION['member']==''){
		$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
		$rows = mysql_num_rows($result);
		if($rows<1){
			$errMsg = $_lang == 'vn'?'Sai <span style="color:#FF0000"> "tên đăng nhập" !</span>':'Username wrong !';
		}else{
			$row = mysql_fetch_array($result);
			if($pwd != $row['pwd']){
				$errMsg = $_lang == 'vn'?'Sai <span style="color:#FF0000">"mật khẩu" !</span>':'Password wrong !';
			}else{
				$flagLogin = true;
			}
		}
	}
}

if($flagLogin){
	$_SESSION['member'] = isset($_SESSION['member'])?$_SESSION['member']:$uid;		
	echo "<script>window.location='./?frame=checkout'</script>";
}else{
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>



<br />

<table border="1" width="100%" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse">
	<tr>
		<td height="22">
			<!-- <span style="FONT-WEIGHT: 700; FONT-SIZE: 10pt; ">&nbsp;&nbsp;<?php echo $l_member?></span> -->
		</td>
	</tr>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
					<form name="frmLogin" method="POST" action="./">
						<input type="hidden" name="frame" value="login">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr><td colspan="3" height="10"></td></tr>
							<tr>
								<td align="right" width="40%"><?php echo $l_Uid?></td>
								<td width="5"></td>
								<td><input type="text" name="txtUid" class="textbox"></td>
							</tr>
							<tr>
								<td align="right"><?php echo $l_Pwd?></td>
								<td width="5"></td>
								<td><input type="password" name="txtPwd" class="textbox"></td>
							</tr>
							<tr><td colspan="3" height="10"></td></tr>
							<tr>
								<td align="right"></td>
								<td width="5"></td>
								<td>
									<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 22px" onmouseout="this.className='buttonorange'" type="submit" value="<?php echo $l_btnLogin?>" name="btnLogin" onclick="return btnLogin_onclick()">
									<a href="./?frame=forgotpass">
									<span style=" text-decoration:none"><?php echo $l_ForgotPwd?></span></a>	
								</td>
							</tr>
							
						</table>
					</form>
					</td>
				</tr>
			</table>
	
		</td>
	</tr>
</table>

		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>
<?php }?>

<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

  