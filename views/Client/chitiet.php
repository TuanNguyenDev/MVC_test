<?php 
require('views/layouts/header.php');
require('views/layouts/menu.php');
 ?>
<div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$chitietTin->TieuDe?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="public/image/tintuc/<?=$chitietTin->Hinh?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$chitietTin->created_at?></p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?=$chitietTin->TomTat?></p>
                <p><?=$chitietTin->NoiDung?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" method="post" action="index.php?r=addComment">
                        <input type="hidden" name="id_tin" value="<?=$chitietTin->id?>">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="cmt" id="cmt"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                foreach ($comment as $cmt) {
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small><?=$cmt->created_at?></small>
                        </h4>
                        <?=$cmt->NoiDung?>
                    </div>
                </div>
                <?php
                }
                 ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    <?php 
                    foreach ($tinlienquan as $tin) {
                        ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="index.php?r=chitiet&id_tin=<?=$tin->id?>">
                                    <img class="img-responsive" src="public/image/tintuc/<?=$tin->Hinh?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="index.php?r=chitiet&id_tin=<?=$tin->id?>"><b><?=$tin->TieuDe?></b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php
                    }

                     ?>
                    </div>
                </div>
                <?php 
                if(isset($tinmoi)){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                <?php 
                foreach ($tinmoi as  $value) {
                 ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="index.php?r=chitiet&id_tin=<?=$value->id?>">
                                    <img class="img-responsive" src="public/image/tintuc/<?=$value->Hinh?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="index.php?r=chitiet&id_tin=<?=$value->id?>"><b><?=$value->TieuDe?></b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                <?php
                    }
                ?>
                    </div>
                </div>
                <?php
                }
                 ?>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <?php 
    require('views/layouts/footer.php');
     ?>