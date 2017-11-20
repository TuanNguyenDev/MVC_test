<div class="container">

    	<!-- slider -->
    	<?php 
    	if(isset($view) && $view == "views/Client/index.php")
    	{
    		include('slide.php');
    	}
    	 ?>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
					<?php 
					foreach ($menu as $m) {
					?>
					<li href="#" class="list-group-item menu1">
                    	<?=$m->Ten?>
                    </li>
                    <ul>
                    	<?php 
                    	$loaitin = explode(',',$m->LoaiTin);
                    	foreach ($loaitin as  $loai) {
                    		# code...
                    		list($id,$ten,$tenkhongdau) = explode(':', $loai);

                    		?>
	                		<li class="list-group-item">
	                			<a href="index.php?r=loaitin&id_loai=<?=$id?>"><?=$ten?></a>
	                		</li>
                    		<?php
                    	}
                    	 ?>
                    </ul>
					<?php
					}
					 ?>
            </div>

            <?php 
            include('main-content.php');
             ?>
        </div>
        <!-- /.row -->
    </div>