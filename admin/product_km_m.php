<?php // Config
$tableCategoryConfig = 'tbl_product';
$tableConfig         = 'tbl_product';
$actConfig           = 'product_km_m';
?>

<?php $errMsg =''?>
<?php 
if (isset($_POST['btnSave'])) {
	$product_id = $_POST['id'];
	$km       = $_POST['txtSort'];
				
	$ten = trim($_POST['txtName']);
	if ($product_id==""){
		$errMsg = 'Hãy chọn sản phẩm !';
	}else{
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			$sql = "update ".$tableConfig." set km = ".$km." where id='".$oldid."'";

		}
		if (mysql_query($sql,$conn)){
			$errMsg = 'Cập nhật thành công.';
			echo "<script>window.location='./?act=".$actConfig."&page=".$_REQUEST['page']."&code=1'</script>";
		}
		else $errMsg = 'Không thể cập nhật !';
	}
}else{
	if (isset($_GET['id'])) {
		$oldid = $_GET['id'];

		$sql = "select * from ".$tableConfig." where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)){
			$row = mysql_fetch_array($result);
			
			$code          = $row['code'];
			$name          = $row['name'];
			$image         = $row['image'];
			$image_large   = $row['image_large'];
			$km 		   = $row['km'];
		}
	}
}
?>

<form method="POST" name="frmForm" action="?act=product_km_m&id=330&page=" nectype="multipart/form-data">
<input type="hidden" name="act" value="<?php echo $actConfig?>_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">

<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td>
			<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
				<tr>
					<td colspan="3" align="center">
						<table width="100%">
							<?php if($image!='' || $image_large!=''){?>
							<tr>
								<td width="15%"></td>
								<td width="40%" align="center" class="smallfont">
									<?php if ($image!=''){ echo '<img border="0" src="../'.$image.'" width="100"><br><br>Hình (kích thước nhỏ)';}?>
								</td>
								
								<td width="40%" align="center" class="smallfont">
									<?php if ($image_large!=''){ echo '<img border="0" src="../'.$image_large.'" width="100"><br><br>Hình (kích thước lớn)';}?>
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
					<td width="15%" class="smallfont" align="right">Mã S&#7843;n ph&#7849;m</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input readonly value="<?php echo $code?>" type="text" name="txtCode" class="textbox" size="34" disabled>
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Tên S&#7843;n ph&#7849;m</td>
					<td width="1%" class="smallfont" align="center"><font color="#FF0000">*</font></td>
					<td width="83%" class="smallfont">
						<input readonly value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34" disabled> 
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Phần trăm khuyến mại</td>
					<td width="1%" class="smallfont" align="right"></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $km?>" type="text" name="txtSort" class="textbox" size="34">
					</td>
				</tr>

				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
					<!-- sao cho nay k dung form  -->
						<input type="submit" name="btnSave" VALUE="Cập nhật" class="button" >
						<input type="reset" class=button value="Nhập lại">
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>