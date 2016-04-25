<?php switch ($_REQUEST['act']){
	//-------------------------------------------------------------------------------------------
	case "product_category"   : $title = 'Danh mục sản phẩm';break;
	case "product_category_m" : $title = 'Hiệu chỉnh / Cập nhật : Danh mục sản phẩm';break;
	case "product"  		  : $title = 'Sản phẩm';break;
	case "product_m" 		  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm';break;	
	case "product_new" 		  : $title = 'Sản phẩm mới';break;
	case "product_new_m"	  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm mới';break;	
	case "product_special"	  : $title = 'Sản phẩm bán chạy';break;
	case "product_special_m"  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm bán chạy';break;	
	case "product_km"	 	  : $title = 'Sản phẩm khuyến mại';break;
	case "product_km_m"  	  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm khuyến mại';break;
	case "order"              : $title = 'Đơn hàng';break;
	case "order_detail"       : $title = 'Chi tiết : Đơn hàng';break;
	case "changepass"         : $title = 'Đổi mật khẩu';break;
	case "adv"				  : $tile = 'Quảng cáo';break;
	case "member"             : $title = 'Thành viên';break;
	case "member_m"           : $title = 'Thêm mới / Cập nhật : Thành viên';break;
	case "adv" 				  : $title ="Quảng cáo";break;
	case "adv_m" 				  : $title ="Thêm quảng cáo mới";break;
	case "news"				  : $title ="Tin tức";break;
	case "news_m"			  : $title ="Thêm tin tức mới";break;
	case "km"				  : $title ="Khuyến mại";break;
	case "km_m"			  : $title ="Thêm khuyến mại mới";break;		
	case "bcdt"			  : $title ="Báo cáo doanh thu";break;
	case "khtn"			  : $title ="Khách hàng tiềm năng";break;

		//----------------------------------------------------------------------------------------------
	default                   : $title = 'Thống kê';break;
}
echo $title;
?>