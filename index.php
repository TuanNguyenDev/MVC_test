<?php 
include_once('controllers/HomeController.php');
$url = isset($_GET['r']) == true ? $_GET['r'] : "/";
switch ($url) {
	case '/':
		$clt = new HomeController();
		$clt->index();
		break;
	case 'loaitin':
		$ctl = new HomeController();
		$ctl->loaitin();
		break;
	case 'chitiet':
		$ctl = new HomeController();
		$ctl->chitietTin();
		break;
	case 'search':
		$ctl = new HomeController();
		$ctl->searchTin();
		break;
	case 'dangki':
		include("views/Client/dangki.php");
		break;
	case 'xulidangki':
		$ctl = new HomeController();
		$ctl->xuLiDangKi();
		break;
	case 'dangnhap':
		include("views/Client/dangnhap.php");
		break;
	case 'xulidangnhap':
		$ctl = new HomeController();
		$ctl->xuLiDangNhap();
		break;
	case 'dangxuat':
		$ctl = new HomeController();
		$ctl->dangxuat();
		break;
	case 'addComment':
		$ctl = new HomeController();
		$ctl->ThemBinhLuan();
		break;
	default:
		echo "Error, Not HTTP Exception!";
		break;
}
 ?>