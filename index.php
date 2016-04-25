<?php
if(!session_id())
	session_start();

error_reporting(0);

require("config.php");
require("common_start.php");
require("lib/func.lib.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thu Thảo Laptop</title>
<script language="javascript" src="lib/varAlert.<?php echo $_lang?>.unicode.js"></script>
<script language="javascript" src="lib/javascript.lib.js"></script>
<script language="javascript">
function btnSearch_onclick(){
	if(test_empty(document.frmSearch.keyword.value)){
		alert(mustInput_Search);document.frmSearch.keyword.focus();return false;
	}
	document.frmSearch.submit();
	return true;
}

</script>
<script>
function $(url,id,eval_str){
    if(document.getElementById){var x=(window.ActiveXObject)?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();}
    if(x){x.onreadystatechange=function() {
        el=document.getElementById(id);
        el.innerHTML='<img src="images/weather/loading.gif" align="left" />';
        if(x.readyState==4&&x.status==200){
            el.innerHTML='';
            el=document.getElementById(id);
            el.innerHTML=x.responseText;
            eval(eval_str);
            }
        }
    x.open("GET",url,true);x.send(null);
    }
}

function change(id){
	$('weather.php?id='+id,'noidung');
}
</script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	margin-top: 0px;
}
-->
</style></head>

<body>
<table  border="0" align="center" cellpadding="0" cellspacing="0" style="width: 100%">
  
  <tr>
    <td bgcolor="#FFFFFF"><table  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="width: 100%">
      <tr>
        <td><img src="baner.png"/></td>
      </tr>
      <tr>
        <td class="style1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%"><a href="./" class="link1">TRANG CHỦ</a></td>
              <td width="10%"><a href="./?frame=intro" class="link1">GIỚI THIỆU</a></td>
              <td width="15%"><a href="./?frame=service" class="link1">HƯỚNG DẪN THANH TOÁN</a></td>
              <td width="8%"><a href="./?frame=contact" class="link1">LIÊN HỆ</a></td>
              <td width="15%"><a href="./?frame=news" class="link1">TIN TỨC &amp; SỰ KIỆN</a></td>
               <td width="15%"><a href="./?frame=km" class="link1">KHUYẾN MÃI</a></td>
              <td width="10%"><a href="./?frame=search" class="link1">TÌM KIẾM</a></td>
              <td width="10%"><a href="./?frame=ph" class="link1">PHẢN HỒI</a></td>
              <td></td>
              <td width="2%"><img src="images/icon_search.gif" width="11" height="11" /></td>

              <form action="./" method="get" name="frmSearch">
                <input type="hidden" name="act" value="search"/>
                <input type="hidden" name="frame" value="search"/>
                <td width="13%"><input name="keyword" type="text" class="search" value="Tìm kiếm nhanh" onFocus="this.value='';"/></td>
               <!--  <td width="21%"><input name="Submit" type="submit" class="style19" value="Tìm kiếm nhanh! " onClick="return btnSearch_onclick();"/></td> -->
              </form>
              
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class="style4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr valign="top">
              <td width="193"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><?php $code = $_lang == 'vn' ? 'vn_download' : 'en_download';
            $parentWhere = "parent = (select id from tbl_content_category where code='$code')";
            $download = getRecord("tbl_content",$parentWhere);
            {?>
                              <a href="Bang bao gia.doc" target="_blank"><img src="images/download.gif" width="193" height="28" border="0"/></a>
                              <?php }?>
                          </td>
                        </tr>
                        <tr>
                          <td><?php include('module/product_category.php')?></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/httt.png" width="195" height="29" /></td>
                        </tr>
                        <tr>
                          <td class="style5"><table width="190" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td height="20" colspan="2" align="center" valign="top"><table width="160" border="0" align="center">
                                    <tr>
                                      <td align="center"><img src="images/hotline.png" alt="hot line" width="165" height="49" /><b>Bản đồ đường đi</><br /> 
                                        <a href="bando/sodo.php" target="_blank"><img src="images/sodo.jpg" width="165" height="49" border="0" /></a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center"><?php include('box/box_yahoo.php')?></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                  
                  <tr>
                    <td class="style15"><?php include('box/box_left_top.php')?></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td style = "background-color : #136eb2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                             
                                <td width="100%" width="6" height="29" class="style11"><center>THỐNG KÊ TRUY CẬP</center></td>
                              </tr>
                          </table></td>
                        </tr>
                        <?php include('box/box_total.php')?>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_left_bottom.php')?></td>
                  </tr>
              </table></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   
                  </tr>
                  <tr>
                    <td class="style16"><?php
					if( empty( $_REQUEST['frame'] ) )
					{
						include('module/home.php');
						include('module/product_km.php');
					}
					else 
					{?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td  style=" background-color : #136eb2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                 
                                  <td class="style11"  height="29" ><?php include('module/processTitle.php')?></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td class="style20"><table width="100%" border="0">
                                <tr>
                                  <td><?php include('module/processFrame.php')?></td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                      <?php }?>

                    </td>
                  </tr>

              </table>
              <center>
              <table>
                	
                
                	<tr><?php include('module/adv.php') ?></tr>
              </table></center>
              </td>
              <td width="193"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="style15">
                    <table width="100%" border="3" cellspacing="5" cellpadding="0" style=" border-color:  #136eb2">
                        <tr>
                          <td><br>
                            <!-- start -->
                         <?php if(!isset($_SESSION['member']) || $_SESSION['member']==''){
                             $flagLogin = false;
                          ?>
                        <a href="./?frame=login" > 
                        <center> <input  style="WIDTH: 89px; HEIGHT: 22px" class="buttonorange" type="submit" value="Đăng nhập" class="button" /><br /></center></a>   
                        <br><center>
                        <input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 22px" onmouseout="this.className='buttonorange'" type="button" value="Đăng ký" name="btnRegistry" onclick="window.location='./?frame=registry'"></center>
                       


                      
          
                        <?php
                          }else{
                             $flagLogin = true;?>
                              <center>  Xin chào: <b><?php echo $_SESSION['member'] ?><b> <br></center><br> 
                               <a href="./?frame=logout" > 
                        <center> <input type="submit" value="Đăng xuất" class="button" /><br /></center></a><br>
                        <center> <a href="./?frame=changepassword">
                      <span style=" text-decoration:none">Đổi mật khẩu</span></a> </center>
                        <?php
                          } 
                         ?>
                        
                            <!-- <--end -->
                          <br></td>
                        </tr>
                        <tr>
                          <td >

                            <table width="100%"cellspacing="0" cellpadding="0">

                              <tr>
                                  <td width="43%" rowspan="2" align="center">
                                    <a href="./?frame=cart" >
                                      <img src="images/cart.jpg" width="62" height="58" /></a>
                                  </td>
                                  <td width="57%" class="style9"><a href="./?frame=cart" >GIỎ HÀNG</a>
                                  </td>
                              </tr>
                                  <?php $cnt=0;
				                        	$tongcong=0;
					                        $cart=$_SESSION['cart'];if ($cart<>''){
					                             foreach ($cart as $product){
					                             	$sql = "select * from tbl_product where id='".$product[0]."'";
					                             	$result = mysql_query($sql,$conn);
						                            if (mysql_num_rows($result)>0){
						                          $pro = mysql_fetch_assoc($result)?>
                              <?php }
				                    	$tongcong=$tongcong+$product[1];
					                    $cnt=$cnt+1;
					                     } }				
			                         	?>
                              <tr>
                                  <td valign="top" class="style8"><span class="style10">
                                    <?php echo $tongcong?>
                                  </span> sản phẩm 
                                  </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        
                    </table>
                  </td>
                </tr>
                  <tr>
                    <td class="style15"><?php include('box/box_right_top.php')?></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td style = "background-color : #136eb2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr height="30">
                               
                                <td width="100%" class="style11">SẢN PHẨM BÁN CHẠY <img src="images/new.gif" width="33" height="16" align="absmiddle" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td class="style12"><marquee height="450" behavior="scroll" direction="up" scrolldelay="100" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();">
                            <?php include('module/product_special.php')?>

                            </marquee>
                          </td>
                        </tr>
                       
                    </table></td>
                  </tr>
                  <tr>
                    <td class="style15"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                             
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class="style24"  style="font-size: 10pt;"><center>
		 <br></br>
		 <br>
		<img src="images/hotline.png"><br>
		<span style="color: red; font-weight: bold; font-size: medium;">CÔNG TY TNHH CÔNG NGHỆ TIN HỌC THU THẢO</span><br/>
		<span >Địa chỉ:&nbsp; Số 10 Ngõ 117 Thái Hà, Đống Đa, Hà Nội. &nbsp; Tel: (04) 3537 9690  &nbsp;  Fax (04) 3537 9692 </span><br/>
		<span style="font-weight: bold;">Showroom </span> <span>Số 10 Ngõ 117 Thái Hà, Đống Đa, Hà Nội.(Cách đường thái hà 50m, có chổ  để ô tô)</span><br/>
		<span style="color: red; font-weight: bold;">Tổng đài CSKH: 1900 6838 - 04 7305 6888</span><br/>
		<span style="font-weight: bold;">Thời gian Làm việc : Sáng từ 8h 30 đến 12h chiều 1h30 đến 19h,Từ thứ 2-> chủ nhật</span><br/>
		<span style="font-weight: bold;">Lê Thị Thu Thảo - Đồ án website bán máy tính</span><br/>11:20 PM 3/13/2016
		<span>Email: <a href="mailto:thaovoigtvt2909@ gmail.com">thaovoigtvt2909@ gmail.com</a></span>
		</div>
		</div>
        </center></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><img src="Hinh/space.jpg" width="5" height="5"></td>
  </tr>
</table>
</body>
</html>

<?php require("common_end.php"); ?>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",38333]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>