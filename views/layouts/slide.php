<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php 
                        foreach ($slide as $s) {
                            if ($s->id == 1) {
                        ?>
                        <div class="item active">
                            <img class="slide-image" src="public/image/slide/<?=$s->Hinh?>" alt="">
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="item">
                            <img class="slide-image" src="public/image/slide/<?=$s->Hinh?>" alt="">
                        </div>
                        <?php        
                            }
                        }
                         ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>