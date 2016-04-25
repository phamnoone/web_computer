<?php 
$members = countRecord("tbl_visitor");

$product = countRecord("tbl_product");

$adv = countRecord("tbl_adv");

$news = countRecord("tbl_news");

$order = countRecord("tbl_order");

$product_new = countRecord("tbl_product_new");

$product = countRecord("tbl_product");

$product_special = countRecord("tbl_product_special");

$product_category = countRecord("tbl_product_category");

$km = countRecord("tbl_km");
?>
<table width="100%">
	<tr>
		<td>
		
<table align="center" width="300" cellpadding="5" border="1" bordercolor="#0069A8">
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số người đang truy cập</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $members?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số thương hiệu đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $product_category?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số sản phẩm đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $product?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số sản phẩm mới đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $product_new?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số sản phẩm bán chạy đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $product_special?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số đơn hàng đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $order?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số thành viên đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $members?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số quảng cáo đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $adv?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số tin tức đang có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $news?></b>&nbsp;</td>
	</tr>

	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;Số tin khuyến mại có</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $km?></b>&nbsp;</td>
	</tr>
</table>
		
		</td>
	</tr>
	<tr><td height="20"></td></tr>
	<tr>
		<td>
		
<table align="center" width="250" cellpadding="5" border="1" bordercolor="#0069A8">
	<!-- <tr>
		<td class="smallfont" style="border-right:none;">&nbsp;- Tổng lượt truy cập</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $total_visits?></b>&nbsp;</td>
	</tr> -->
</table>
		
		</td>
	</tr>
</table>

