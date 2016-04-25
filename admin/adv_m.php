<?php // Config

$tableCategoryConfig = 'tbl_adv';
$tableConfig         = 'tbl_adv';
$actConfig           = 'adv';

?>

<?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	echo '<script language="javascript" src="../lib/scripts/editor.js"></script>';
else
	echo '<script language="javascript" src="../lib/scripts/moz/editor.js"></script>'?>

<script language="javascript">

</script>

<?php $errMsg =''?>
<?php $path = "../images/content";
$pathdb = "images/content";
if (isset($_POST['btnSave'])){
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$status        = $_POST['chkStatus']!='' ? 1 : 0;
	$errMsg .= checkUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png",500*1024,0);
	$web        = $_POST['txtWeb'];
	$date_start        = $_POST['txtDateStart'];
	$date_stop        = $_POST['txtDateStop'];

	if ($errMsg==''){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			$sql = "update ".$tableConfig." set name='".$code."',webadd ='".$web."', status='".$status."' , date_start = '".$date_start."' ,  date_stop = '".$date_stop	."' where id='".$oldid."'";
			
		}else{
			$sql = "insert into ".$tableConfig." (name, status, date_start, date_stop , webadd) values ('".$code."',".$status.",'".$date_start."','".$date_stop."','".$web."')";
			
		}
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord($tableConfig,"id=".$oldid);
			
			$sqlUpdateField = "";
			
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/".$actConfig."_s".$oldid.$extsmall)){
					@chmod("$path/".$actConfig."_s".$oldid.$extsmall, 0777);
					$sqlUpdateField = " image='$pathdb/".$actConfig."_s".$oldid.$extsmall."' ";
				}
			}else{
				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
				$sqlUpdateField = " image='' ";
			}
			
			
			if($sqlUpdateField!='')	{
				$sqlUpdate = "update ".$tableConfig." set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		echo '<script>window.location="./?act='.$actConfig.'&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from ".$tableConfig." where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$code          = $row['name'];
			$image         = $row['image'];
			$status        = $row['status'];
			$date_start        = $row['date_start'];
			$date_stop        = $row['date_stop'];
			$web  		   = $row['webadd'];
		}
	}
}

?>


<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="txtSubject" id="txtSubject">
<input type="hidden" name="txtDetailShort" id="txtDetailShort">
<input type="hidden" name="txtDetail" id="txtDetail">

<input type="hidden" name="act" value="<?php echo $actConfig?>_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td width="45%">
    		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
				<tr>
					<td colspan="3" align="center">
						<table width="100%">
							<?php if($image!='' || $image_large!=''){?>
							<tr>
								<td width="15%"></td>
								<td width="40%" align="center" class="smallfont" >
								<?php if ($image!=''){ echo '<img border="0"  src="../'.$image.'"><br><br>Hình ảnh';}?>
								</td>
								<td width="15%"></td>
							</tr>
							<?php }else{echo '<tr><td colspan="3" class="smallfont" align="center">Chưa có hình ảnh !</td></tr>';}?>
							<tr><td colspan="4" height="10"></td></tr>
							<tr><td colspan="4" height="1" bgcolor="#999999"></td></tr>
							<tr><td colspan="4" height="10"></td></tr>
						</table>
					</td>
				</tr>
        		
				<tr>
        			<td width="15%" class="smallfont" align="right">Tên quảng cáo</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $code?>" type="text" name="txtCode" class="textbox" size="34">
					</td>
      			</tr>
      				<tr>
        			<td width="15%" class="smallfont" align="right">Địa chỉ trang web</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $web?>" type="text" name="txtWeb" class="textbox" size="34">
					</td>
      			</tr>

      			<tr>
        			<td width="15%" class="smallfont" align="right">Ngày bắt đầu</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $date_start?>" type="text" name="txtDateStart" class="textbox" size="34">
					</td>
      			</tr>

      			<tr>
        			<td width="15%" class="smallfont" align="right">Ngày kết thúc</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $date_stop?>" type="text" name="txtDateStop" class="textbox" size="34">
					</td>
      			</tr>
				
				
				<tr>
					<td width="15%" class="smallfont" align="right">Hình ảnh</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="file" name="txtImage" class="textbox" size="34">
						<input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình
					</td>
				</tr>
				
			
				
				
				<tr>
					<td width="15%" class="smallfont" align="right">Không hiển thị</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="checkbox" name="chkStatus" value="on" <?php echo $status>0?'checked':''?>>
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="submit" name="btnSave" VALUE="Đồng ý" class=button onclick="return btnSave_onclick()">
						<input type="reset" class=button value="Nhập lại">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>