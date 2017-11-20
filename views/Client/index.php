<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
    </div>
    <div class="col-md-6">
        <?php
        if (isset($_SESSION["succes"])) {
             echo $_SESSION["succes"];
             unset($_SESSION["succes"]);
         } 
         ?>
    </div>

    <div class="panel-body">
        <!-- item -->
        <?php 
        foreach ($menu as $m) {
        ?>
        <div class="row-item row">
            <h3>
                <a href="#"><?=$m->Ten?></a> |
                <?php 
                $loaitin = explode(',',$m->LoaiTin);
                        foreach ($loaitin as  $loai) {
                            # code...
                            list($id,$ten,$tenkhongdau) = explode(':', $loai);
                            ?>
                            <small><a href="index.php?r=loaitin&id_loai=<?=$id?>">
                             <i><?=$ten?></i></a>/</small>
                            <!-- <small><a href="loaitin.html"> -->
                            <?php
                        }
                 ?>
            </h3>
            <div class="col-md-12 border-right">
                <div class="col-md-3">
                    <a href="index.php?r=chitiet&id_tin=<?=$m->id?>">
                        <img class="img-responsive" src="public/image/tintuc/<?=$m->HinhTin?>" alt="">
                    </a>
                </div>

                <div class="col-md-9">
                    <a href="index.php?r=chitiet&id_tin=<?=$m->id?>" title="">
                        <h3><?=$m->TieuDeTin?></h3>
                    </a>
                    <p><?=$m->TomTatTin?></p>
                    <a class="btn btn-primary" href="index.php?r=chitiet&id_tin=<?=$m->id?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>

            </div>

            <div class="break"></div>
        </div>
        <?php
        }
         ?>
        <!-- end item -->
    </div>
</div>