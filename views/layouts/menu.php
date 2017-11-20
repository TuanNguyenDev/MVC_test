<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Tin Tức</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php?r=gioithieu">Giới thiệu</a>
            </li>
            <li>
                <a href="lienhe.html">Liên hệ</a>
            </li>
        </ul>

        <form class="navbar-form navbar-left" action="index.php" method="GET" role="search">
            <input type="hidden" name="r" value="search">
	        <div class="form-group">
	          <input type="text" name="key" class="form-control" placeholder="Nhập từ khóa">
	        </div>
	        <button type="submit" class="btn btn-default">Tìm kiếm</button>
	    </form>

	    <ul class="nav navbar-nav pull-right">
            <?php 
            if (!isset($_SESSION['name'])) {
            ?>
            <li>
                <a href="index.php?r=dangki">Đăng ký</a>
            </li>
            <li>
                <a href="index.php?r=dangnhap">Đăng nhập</a>
            </li>
            <?php
            }else
            {
             ?>
            <li>
            	<a>
            		<span class ="glyphicon glyphicon-user"></span>
            		<?=$_SESSION['name']?>
            	</a>
            </li>
            <li>
            	<a href="index.php?r=dangxuat">Đăng xuất</a>
            </li>
             <?php   
            }
             ?>
        </ul>
    </div>



    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>