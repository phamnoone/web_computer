<?php switch ($_REQUEST['act']){

	//Product_category------------------------------------------------------------------
	
	case "product_category"    : include("product_category.php");break;
	case "product_category_m"  : include("product_category_m.php");break;
	case "product"             : include("product.php");break;
	case "product_m"           : include("product_m.php");break;
	case "product_new"         : include("product_new.php");break;
	case "product_new_m"       : include("product_new_m.php");break;
	case "product_special"     : include("product_special.php");break;
	case "product_km_m"        : include("product_km_m.php");break;
	case "product_km"    	   : include("product_km.php");break;
	case "product_special_m"   : include("product_special_m.php");break;
	case "order"          	   : include("order.php");break;
	case "order_detail"   	   : include("order_detail.php");break;
	case "adv" 				   : include("adv.php");break;
	case "adv_m" 			   : include("adv_m.php");break;
	case "member"			   : include("member.php");break;
	case "member_m"    		   : include("member_m.php");break;
	case "news"				  : include("news.php");break;
	case "news_m"			  : include("news_m.php");break;
	case "km"				  : include("km.php");break;
	case "km_m"			  : include("km_m.php");break;
	case "bcdt"			  : include("bcdt.php");break;
	case "khtn"			  : include("khtn.php");break;
	//------------------------------------------------------------------------------------
	
	case "changepass"     : include("changePassword.php");break;
	case "login"          : include("login.php");break;
	case "logout" :
		unset($_SESSION['log']);
		echo "<script>window.location='./?frame=home'</sc"."ript>";
		break;
	
	//--------------------------------------------------------------------------------------
	
	case "home"          : include("home.php");break;
	default              : include("home.php");break;
}
?>