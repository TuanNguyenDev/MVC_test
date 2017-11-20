<?php 
require('views/layouts/header.php');
require('views/layouts/menu.php');
 ?>
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
        	<?php 
        	if (isset($_SESSION['fail'])) {
        		echo $_SESSION['fail'];
        		unset($SESSION['fail']);
        	}
        	 ?>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
			  	<div class="panel-heading">Đăng ký tài khoản</div>
			  	<div class="panel-body">
			    	<form action="index.php?r=xulidangki" method="POST">
			    		<div>
			    			<label>Họ tên</label>
						  	<input type="text" class="form-control" placeholder="Username" id="name" name="name" aria-describedby="basic-addon1">
						</div>
						<br>
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon1"
						  	>
						</div>
						<br>	
						<div>
			    			<label>Nhập mật khẩu</label>
						  	<input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon1">
						</div>
						<br>
						<div>
			    			<label>Nhập lại mật khẩu</label>
						  	<input type="password" class="form-control" id="re_password" name="passwordAgain" aria-describedby="basic-addon1">
						</div>
						<br>
						<button type="submit" class="btn btn-success" onclick="return validate()">Đăng ký
						</button>

			    	</form>
			  	</div>
			</div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<?php 
require('views/layouts/footer.php');
?>
<script type="text/javascript">
	function validate(){
		var name = document.getElementById("name").value;
		var pass = document.getElementById("password").value;
		var re_pass = document.getElementById("re_password").value;
		if (name == "") {
			alert("Hãy nhập tên!");
			return false;
		}
		if (pass == "") {
			alert("Hãy nhập mật khẩu!");
			return false;
		}
		if (re_pass != pass) {
			alert("Hai mật khẩu nhập vào phải giống nhau!");
			return false;
		}
		return true;
	}
</script>