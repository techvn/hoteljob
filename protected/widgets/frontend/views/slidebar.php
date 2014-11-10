<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 11/10/14
 * Time: 3:38 PM
 */
$baseUrl = Yii::app()->baseUrl;
?>
<div class="lab-slide">
    <div id="home-slideheader" class="owl-carousel">
        <?php
        foreach($banners as $b) {
            echo "<div class='item'><a href='{$b->link}'><img class='lazyOwl' src='{$b->banner}' alt='Lazy Owl Image'></a></div>";
        }
        ?>
        <!--<div class="item"><a href="#">
                <img class="lazyOwl" src="<?php /*echo $baseUrl */?>/assets/frontend/images/imgdemo/slide1.png" alt="Lazy Owl Image"></a>
        </div>
        <div class="item"><a href="#"><img class="lazyOwl" src="<?php /*echo $baseUrl */?>/assets/frontend/images/imgdemo/slide2.png" alt="Lazy dsOwl Image"></a>
        </div>
        <div class="item"><a href="#"><img class="lazyOwl" src="<?php /*echo $baseUrl */?>/assets/frontend/images/imgdemo/slide3.jpg"
                                           alt="Lazy Odsdsdswl Image"></a></div>
        <div class="item"><a href="#"><img class="lazyOwl" src="<?php /*echo $baseUrl */?>/assets/frontend/images/imgdemo/slide4.png"
                                           alt="Lazy Owl Idsdsdsmage"></a></div>-->

    </div>
</div>