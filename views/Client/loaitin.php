<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337AB7; color:white;">
        <h4><b><?=$title->Ten?></b></h4>
    </div>
    <?php 
    foreach ($danhmuctin as $t) {
    ?>
    <div class="row-item row">
        <div class="col-md-3">

            <a href="detail.html">
                <br>
                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$t->Hinh?>" alt="">
            </a>
        </div>

        <div class="col-md-9">
            <h3><?=$t->TieuDe?></h3>
            <p><?=$t->TomTat?></p>
            <a class="btn btn-primary" href="index.php?r=chitiet&id_tin=<?=$t->id?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
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
            <!-- <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul> -->
        </div>
    </div>
    <!-- /.row -->

</div>
