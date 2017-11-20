<?php 
require('views/layouts/header.php');
require('views/layouts/menu.php');
 ?>
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
        <div class="col-md-4">
				<?php 
				if (isset($_SESSION['login_error'])) {
					echo $_SESSION['login_error'];
					unset($_SESSION['login_error']);
				}
				if(isset($_SESSION['cmt_error'])){
					echo $_SESSION['cmt_error'];
					unset($_SESSION['cmt_error']);
				}
				 ?>
            <div class="panel panel-default">
			  	<div class="panel-heading">Đăng nhập</div>
			  	<div class="panel-body">
			    	<form method="post" action="index.php?r=xulidangnhap">
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" name="email" id="email" 
						  	>
						</div>
						<br>	
						<div>
			    			<label>Mật khẩu</label>
						  	<input type="password" class="form-control" name="password" id="password">
						</div>
						<br>
						<button type="submit" class="btn btn-success">Đăng nhập
						</button>
			    	</form>
			  	</div>
			</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<?php 
require('views/layouts/footer.php');
?>