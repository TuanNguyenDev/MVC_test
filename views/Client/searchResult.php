<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337AB7; color:white;">
        <h4><b>Tìm thấy <?=$total?></b></h4>
    </div>
    <?php 
    foreach ($result as $r) {
    ?>
    <div class="row-item row">
        <div class="col-md-3">

            <a href="index.php?r=chitiet&id_tin=<?=$r->id?>">
                <br>
                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$r->Hinh?>" alt="">
            </a>
        </div>

        <div class="col-md-9">
            <a href="index.php?r=chitiet&id_tin=<?=$r->id?>" title="">
                <h3><?=$r->TieuDe?></h3>
            </a>
            <p><?=$r->TomTat?></p>
            <a class="btn btn-primary" href="index.php?r=chitiet&id_tin=<?=$r->id?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="break"></div>
    </div>
    <?php
    }
     ?>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <div>
                <?=$paginationHTML?>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
