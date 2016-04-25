<link href="../css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style30 {color: #FF0000}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
               
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td style=" background-color : #136eb2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="6"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td class="style11">SẢN KHUYẾN MẠI</td>
                        </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td class="style20">
					  	<?php $row = 5;
$col = 4;

$cat = 0;
if($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p_new=0;
if ($_REQUEST['p_new']!='') $p_new=$_REQUEST['p_new'];
$sql = "select * from tbl_product where  km !=0 limit ".$row*$col*$p_new.",".$row*$col;

$result = @mysql_query($sql,$conn);
$total = countRecord("tbl_product","status=0 and km !=0");
if($total==0){
?>
<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="10"></td></tr>
	<tr>
		<td align="center">
			<font color="#FFFFFF"><strong><?php echo $_lang=="vn"?'Sản phẩm mới đang cập nhật !':'Products are being updated !'?></strong></font>
		</td>
	</tr>
	<tr><td height="10"></td></tr>
</table>
<?php }else{
?>

<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<?php for($i=0; $i<$row; $i++){
?>
	<tr>			  
			
<?php for($j=0; $j<$col&&$products=mysql_fetch_assoc($result); $j++){
		$pro = getRecord("tbl_product","id=".$products['id'])?><td width="10px"></td>
		<td>
         <div class="item"><center>
         	<a href="./?frame=product_detail&id=<?php echo $pro['id']?>" title="<?php echo $pro['name']?>">
         		<?php 
					if($pro['image']!='' || $pro['image_large']!='')
					{ $img = $pro['image']!='' ? $pro['image'] : $pro['image_large'];
						?>
							<img src="<?php echo $img?>" width="120" height="100" border="0" />
						<?php }
				?>
         	</a>
         	<div class="content" >
         		<h4 ><?php echo $pro['name']?><img src="images/icon_km.gif"></h4>
            <p><p>
         		<p class="style30"><b><del><?php echo number_format($pro['price'],0,',','.') ?></del><b></p>
                <p class="style30">Giảm giá <b><?php echo number_format($pro['km'],0,',','.') ?>%<b></p>
            <p class="style30"><b>Giá chỉ còn <?php echo number_format($pro['price']*(100-$pro['km'])/100,0,',','.') ?><b></p>
           
            <p></p>
         	</div>
         	<a href="./?frame=product_detail&id=<?php echo $pro['id']?>">
	         	<div class="overlay"><center>
	         		<p class="title"><?php echo $pro['name']?></p>
	         		<p class="title"><?php echo $pro['detail_view']?></p>
	         		<p class="title"><?php echo $pro['id']?></p>
	         </center></div>
         	</a>
        </center> </div>
            <?php }
		while($j<$col){
			echo "";
			$j=$j+1;
		}
?></td>
	</tr>	  
<?php }?>
</table>

<?php }?>					 </td>
                    </tr>
                    </table></td>
  </tr>
                <tr>
                  <td class="style4"><?php include('box/box_logo.php')?></td>
  </tr>
                <tr>
                  <td class="style4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   
                    <tr>
                     
		</tr>
	</table></td>
  </tr>
</table>