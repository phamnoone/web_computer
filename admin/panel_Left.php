<?php $arrMenu = array(
	array(
		'Quản lý sản phẩm',
		'Thương hiệu_$_./?act=product_category',
		'Sản phẩm_$_./?act=product',
		'Sản phẩm mới_$_./?act=product_new',
		'Sản phẩm khuyến mại_$_./?act=product_km',
		'Sản phẩm bán chạy_$_./?act=product_special',
		),	
	array(
		'Quản lí đơn hàng',
		'Danh sách đơn hàng_$_./?act=order',
		'Khách hàng tiềm năng_$_./?act=khtn',
		'Báo cáo doanh thu_$_./?act=bcdt'
		
	),
	array(
		'Quản lí thành viên',
		'Danh sách thành viên_$_./?act=member',
		
	),
	array(
		'Hệ thống',
		'Quảng cáo_$_./?act=adv',
		'Khuyến mại_$_./?act=km',
		'Tin tức_$_./?act=news',
		'Đổi mật khẩu_$_./?act=changepass',
		'Thoát_$_./?act=logout',
	),
);

for($i=0;$i<count($arrMenu);$i++){?>
<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" width="161" cellpadding="0">
	<tr>
		<td width="161" height="20" bgcolor="#0069A8" class="title">
			&nbsp;<font style="font-weight: 700" color="#FFFFFF"><?php echo $arrMenu[$i][0]?></font>
		</td>
	</tr>
	<?php for($j=1;$j<count($arrMenu[$i]);$j++){
		$arr = explode('_$_',$arrMenu[$i][$j]);
	?>
	<tr>
		<td width="161" height="25" class="normalfont" style="border-bottom-color:#CCCCCC">
			<?php if(substr($arr[1],7)!=$_REQUEST['act']){?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><?php echo $arr[0]?></a>
			<?php }else{?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><font color="#CC0000"><?php echo $arr[0]?></font></a>
			<?php }?>
		</td>
	</tr>
	<?php }?>
</table>
<?php }?>