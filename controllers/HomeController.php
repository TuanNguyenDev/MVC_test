<?php 
/**
* 
*/
session_start();
include('models/HomeModel.php');
include('models/pager.php');
class HomeController
{
	public function index(){
		$TinTucModel = new HomeModel();
		$slide = $TinTucModel->getSlide();
		$menu = $TinTucModel->getMenu();
		$view = 'views/Client/index.php';
		include_once('views/layouts/layout.php');
	}
	
	public function loaitin(){
		$id_loai = $_GET['id_loai'];
		$TinTucModel = new HomeModel();
		$danhmuctin = $TinTucModel->getTinTucByIdLoai($id_loai);
		$title = $TinTucModel->getTitlebyId($id_loai);
		$trang_hientai = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$pagination = new pagination(count($danhmuctin),$trang_hientai,10,4);
		$paginationHTML = $pagination->showPagination();
		$position = ($trang_hientai-1)*$pagination->_nItemOnPage;
		$danhmuctin = $TinTucModel->getTintucPhantrang($id_loai, $position, $pagination->_nItemOnPage);
		$menu = $TinTucModel->getMenu();
		$view = 'views/Client/loaitin.php';
		include_once('views/layouts/layout.php');
	}
	public function chitietTin(){
		$id_tin = $_GET['id_tin'];
		$TinTucModel = new HomeModel();
		$chitietTin = $TinTucModel->getChiTietTin($id_tin);
		$tinlienquan = $TinTucModel->getTinLienQuan($id_tin);
		$tinmoi = $TinTucModel->getTinMoi();
		$comment = $TinTucModel->getComment($id_tin);
		include("views/Client/chitiet.php");
	}
	public function searchTin(){
		if (isset($_GET['key'])) {
			$key = $_GET['key'];
			$TinTucModel = new HomeModel();
			$result = $TinTucModel->getSearch($key);
			$total = count($result);
			$trang_hientai = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$pagination = new pagination(count($result),$trang_hientai,10,4);
			$paginationHTML = $pagination->showPagination();
			$position = ($trang_hientai-1)*$pagination->_nItemOnPage;
			$result = $TinTucModel->getSearch($key,$position, $pagination->_nItemOnPage);
			$menu = $TinTucModel->getMenu();
			$view = 'views/Client/searchResult.php';
			include_once('views/layouts/layout.php');
		}
	}
	public function xuLiDangKi(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		$TinTucModel = new HomeModel();
		$dangki = $TinTucModel->GetRegister($name, $email, $pass);
		if ($dangki > 0) {
			$_SESSION["succes"] = "Đăng kí tài khoản thành công";
			if(isset($_SESSION["fail"])){
				unset($_SESSION["fail"]);
			}
			header("Location: index.php");
		}
		else{
			$_SESSION["fail"] = "Có lỗi xảy ra! Hãy đăng kí lại...";
			header("Location: index.php?r=dangki");
		}
	}
	public function checkInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
	public function xuLiDangNhap(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$check = new HomeController();
			$email = $check->checkInput($_POST['email']);
			$password = md5($check->checkInput($_POST['password']));
			$TinTucModel = new HomeModel();
			$user = $TinTucModel->getLogin($email, $password);
			if($user){
				$_SESSION['name'] = $user->name;
				$_SESSION['user_id'] = $user->id;
				if(isset($SESSION['login_error'])){
					unset($SESSION['login_error']);
				}
				header("Location: index.php");
			}else{
				$_SESSION['login_error'] = "Sai thông tin đăng nhập, vui lòng thử lại!";
				header("Location: index.php?r=dangnhap");
			}
		}
	}
	public function dangxuat(){
		session_destroy();
		header("Location: index.php?r=dangnhap");
	}
	public function ThemBinhLuan(){
		if(isset($_SESSION['user_id'])){
			$id_user = $_SESSION['user_id'];
			$id_tin = $_POST['id_tin'];
			$noi_dung = $_POST['cmt'];
			$TinTucModel = new HomeModel();
			$cmt = $TinTucModel->addComment($id_user, $id_tin, $noi_dung);
			header("Location: index.php?r=chitiet&id_tin=$id_tin");
		}
		else{
			$_SESSION['cmt_error'] = "Bạn phải đăng nhập để có thể bình luận!";
			header("Location: index.php?r=dangnhap");
		}
	}
}
 ?>