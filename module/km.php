<?php 
$per_page = 10;
$p=0;
if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);

$sql = "select * from tbl_km where status=0 ";
$result = @mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_assoc($result))
{ ?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<table align="center" border="0" width="98%" cellspacing="0" cellpadding="0">
	<tr>
       <td width="19%"><a href="./?frame=km_m&id=<?php echo $row['id']?>">
	   	<img src="<?php echo $row['image']?>" width="122" height="75" border="0" /></a></td>
      <td width="81%" align="left" valign="top" style="padding-left:5px">
	  		<a href="./?frame=news_detail&id=<?php echo $row['id']?>" class="link5"><?php echo $row['title']?></a><br />
        <br />
        <?php echo $row['short_content']?></td>
    </tr>
   <tr>
        <td colspan="2" id="boder_button">&nbsp;</td>
   </tr>
   <tr><td colspan="2">&nbsp;</td></tr>
</table>
<?php }?>



