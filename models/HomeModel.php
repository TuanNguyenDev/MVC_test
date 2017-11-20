<?php 
/**
* 
*/
include('database.php');
class HomeModel extends database
{
	
	function getSlide()
	{
		$sql = "Select * from slide";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getMenu(){
		$sql = "select tl.*, GROUP_CONCAT(Distinct lt.id,':', lt.Ten,':', lt.TenKhongDau) as LoaiTin, tt.id as idTin, tt.TieuDe as TieuDeTin, tt.Hinh as HinhTin, tt.TomTat as TomTatTin, tt.TieuDeKhongDau as TieuDeKhongDau from theloai tl inner join loaitin lt on lt.idTheLoai = tl.id inner join tintuc tt on tt.idLoaiTin = lt.id group by tl.id";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getTinTucByIdLoai($id_loaitin, $vitri = -1, $limit = -1){
		$sql = "select * from tintuc where idLoaiTin = $id_loaitin";
		if($vitri > -1 && $limit > 0){
			$sql .="limit $vitri, $limit";
		}
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_loaitin));
	}
	function getTitlebyId($id_loaitin){
		$sql = "select Ten from loaitin where id=$id_loaitin";
		$this->setQuery($sql);
		return $this->loadRow(array($id_loaitin));
	}
	function getTintucPhantrang($id_loai,$vt=-1,$limit=-1)
	{
		$sql="select tt.*, lt.TenKhongDau as ten_khong_dau from tintuc tt inner join loaitin lt on tt.idLoaiTin = lt.id where idLoaiTin = $id_loai";
		if ($vt>-1 && $limit>0) {
		    $sql .=" limit $vt,$limit";
		}
		$this->setQuery($sql);
		return $this->loadAllRows();	
	}
	function getChiTietTin($id){
		$sql = "Select * from tintuc where id = $id";
		$this->setQuery($sql);
		return $this->loadRow(array($id));
	}
	function getTinLienQuan($id){
		$sql = "Select * from tintuc where idLoaiTin = (select idLoaiTin from tintuc where id = $id) ORDER BY RAND() LIMIT 4";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getTinMoi(){
		$sql = "Select * from tintuc ORDER BY created_at DESC LIMIT 4";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getComment($id_tin){
		$sql = "Select * from comment where idTinTuc = $id_tin";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getSearch($key, $vitri = -1, $limit = -1){
		$sql = "Select * from tintuc where TieuDe like '%$key%' ";
		if($vitri > -1 && $limit > 0){
			$sql .="limit $vitri, $limit";
		}
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function GetRegister($name, $email, $pass){
		$sql = "INSERT INTO users (name, email, password)  
		VALUES ('$name', '$email', '$pass')";
		$this->setQuery($sql);
		$result = $this->execute(array($name, $email, $pass));
		if($result){
			return $this->getLastId();
		}else
		{
			return false;
		}
	}
	function getLogin($email, $pass){
		$sql = "Select * from users where email = '$email' and password = '$pass'";
		$this->setQuery($sql);
		return $this->loadRow(array($email, $pass));
	}
	function addComment($id_user, $id_tin, $noi_dung){
		$sql = "INSERT INTO comment(idUser,idTinTuc,NoiDung) VALUES('$id_user','$id_tin','$noi_dung')";
		$this->setQuery($sql);
		return $this->execute(array($id_user,$id_tin, $noi_dung));
	}
}
 ?>