<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CPanel - Hotel Job</title>
    <meta name="description" content="description">
    <meta name="keywords" content="Hotel job">
    <meta name="author" content="techvn2012">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/bootstrap/bootstrap.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/jquery-ui/jquery-ui.min.css"
          rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/fancybox/jquery.fancybox.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/fullcalendar/fullcalendar.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/xcharts/xcharts.min.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/plugins/select2/select2.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/js/jquery.multifile.js"></script>
</head>
<body>
<!--Start Header-->
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
    <div class="devoops-modal">
        <div class="devoops-modal-header">
            <div class="modal-header-name">
                <span>Basic table</span>
            </div>
            <div class="box-icons">
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="devoops-modal-inner">
        </div>
        <div class="devoops-modal-bottom">
        </div>
    </div>
</div>

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>"><?php echo Yii::t('dashboard_translator', 'HotelJob') ?></a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>

                        <div id="search">
                            <input type="text" placeholder="search"/>
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <?php $this->widget('application.widgets.backend.Navigator') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->

<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <?php
            $this->widget('application.widgets.backend.Menu', array(
                'list' => array()
            ));
            ?>
        </div>

        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
            <div class="preloader">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/img/devoops_getdata.gif"
                     class="devoops-getdata" alt="preloader"/>
            </div>
            <div id="ajax-content">
                <!-- Main content here -->
                <?php echo $content; ?>
            </div>
        </div>
        <!--End Content-->

    </div>
</div>
<!--End Container-->
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/bootstrap/bootstrap.min.js"></script>
<script
    src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/tinymce/tinymce.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/backend/js/devoops.js"></script>
<script type="text/javascript">
    var base_url = '<?php echo Yii::app()->request->baseUrl; ?>';
</script>
</html>
