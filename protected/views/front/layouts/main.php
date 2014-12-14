<?php
$baseUrl = Yii::app()->baseUrl;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Home page</title>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/jqueryui.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl ?>/assets/frontend/js/hotel.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/fonts/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/owl.carousel.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/style-typo.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/style-header.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/assets/frontend/css/style-main.css"/>

</head>
<body>
<section class="container">
<div class="lab-body">
<header class="header">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="logo">
                <a href="<?php echo $baseUrl ?>" title="<?php echo Yii::t('frontend', 'Home') ?>">
                    <img src="<?php echo $baseUrl ?>/assets/frontend/images/logo_htj.jpg" alt="<?php echo Yii::t('frontend', 'Home') ?>">
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="module-float header-top">
                <div class="right">
                    <a href="<?php echo $baseUrl .'?type=candidate' ?>"><?php echo Yii::t('frontend', 'For candidate') ?></a>
                    <span class="border">|</span>
                    <a href="<?php echo $baseUrl .'?type=store' ?>"><?php echo Yii::t('frontend', 'For recruiter') ?></a>
                </div>
                <div class="left">
                    <a href="<?php echo $baseUrl ?>?_l=en" title="<?php echo Yii::t('frontend', 'English') ?>">
                        <img src="<?php echo $baseUrl ?>/assets/frontend/images/EN.jpg">
                    </a>
                    <a href="<?php echo $baseUrl ?>?_l=vi" class="vn" title="<?php echo Yii::t('frontend', 'Vietnamese') ?>">
                        <img src="<?php echo $baseUrl ?>/assets/frontend/images/VN.jpg">
                    </a>
                </div>
            </div>
            <div class="module-float header-bottom">
                <div class="left">
                    <input type="text" class="form-control form-myinput click-search" id="exampleInput">
                    <span>×</span>
                </div>
                <div class="right">
                    <a class="submit-search"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
$this->widget('application.widgets.frontend.SlideBar', array(
    'list' => $this->banners
));
$this->widget('application.widgets.frontend.Menu');
?>

<div class="main-body">
<div class="col-md-9 col-sm-9 main-content">
<div class="main-search">
    <p class="title"><?php echo Yii::t('frontend', 'Search jobs') ?></p>

    <div class="module-float">
        <div class="item" style="width: 100px">
            <select class="selectpicker">
                <option value="0">Nghề nghiệp</option>
                <option>Hà Nội vdbvsbdvbsdv svdbvds dsbvds</option>
                <option>Sài Gòn</option>
                <option>Đà Nẵng</option>
            </select>
        </div>
        <div class="item" style="width: 120px">
            <select class="selectpicker">
                <option value="0">Tỉnh/Thành phố</option>
                <option>Hà Nội vdbvsbdvbsdv svdbvds dsbvds</option>
                <option>Sài Gòn</option>
                <option>Đà Nẵng</option>
            </select>
        </div>
        <div class="item" style="width: 80px">
            <select class="selectpicker">
                <option value="0">Lĩnh vực</option>
                <option>Hà Nội vdbvsbdvbsdv svdbvds dsbvds</option>
                <option>Sài Gòn</option>
                <option>Đà Nẵng</option>
            </select>
        </div>
        <div class="item" style="width: 125px">
            <select class="selectpicker">
                <option value="0">Thời gian làm việc</option>
                <option>Hà Nội vdbvsbdvbsdv svdbvds dsbvds</option>
                <option>Sài Gòn</option>
                <option>Đà Nẵng</option>
            </select>
        </div>
        <div class="item" style="width: 120px">
            <select class="selectpicker">
                <option value="0">Vị trí cấp bậc</option>
                <option>Hà Nội vdbvsbdvbsdv svdbvds dsbvds</option>
                <option>Sài Gòn</option>
                <option>Đà Nẵng</option>
            </select>
        </div>
        <div class="col-md-2 col-sm-2">
            <button class="btn btn-warning" type="button">Xem thêm</button>
        </div>
    </div>
</div>

<div class="lab-tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#home" role="tab" data-toggle="tab">Nghề nghiệp</a></li>
        <li><a href="#profile" role="tab" data-toggle="tab">Địa điểm</a></li>
        <li><a href="#messages" role="tab" data-toggle="tab">Chức vụ</a></li>
        <li><a href="#settings" role="tab" data-toggle="tab">Lĩnh vực</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <p class="title"> Tìm ngay trên <span class="font-oran">6385 việc làm</span> - Miễn phí! </p>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p>Quản lý điều hành <span class="font-oran">(297)</span></p>

                    <p>Sales/ Marketing/ Guest Relation <span class="font-oran">(297)</span></p>

                    <p>Lễ tân/ Thu ngân/ Đặt phòng/ Tổng đài/ BC <span class="font-oran">(297)</span></p>

                    <p>Buồng/ Kho vải/ Giặt là/ VSCC/ Làm vườn <span class="font-oran">(297)</span></p>

                    <p>Ẩm thực/ Bàn/ Bar <span class="font-oran">(297)</span></p>

                    <p>Bếp/ Phụ bếp/ Rửa bát <span class="font-oran">(297)</span></p>

                    <p>Thể thao/ Thể thao nước/ Golf, Gym <span class="font-oran">(297)</span></p>

                    <p>Vui chơi giải trí/ Spa/ Bar/ Pub/ Vũ trường/ Karaoke <span class="font-oran">(297)</span></p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <p>Hành chính/ Nhân sự/ Thư ký <span class="font-oran">(297)</span></p>

                    <p>Sales/ Marketing/ Guest Relation <span class="font-oran">(297)</span></p>

                    <p>Lễ tân/ Thu ngân/ Đặt phòng/ Tổng đài/ BC <span class="font-oran">(297)</span></p>

                    <p>Buồng/ Kho vải/ Giặt là/ VSCC/ Làm vườn <span class="font-oran">(297)</span></p>

                    <p>Ẩm thực/ Bàn/ Bar <span class="font-oran">(297)</span></p>

                    <p>Bếp/ Phụ bếp/ Rửa bát <span class="font-oran">(297)</span></p>

                    <p>Thể thao/ Thể thao nước/ Golf, Gym <span class="font-oran">(297)</span></p>

                    <p>Vui chơi giải trí/ Spa/ Bar/ Pub/ Vũ trường/ Karaoke <span class="font-oran">(297)</span></p>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile">
            <p class="title"> Tìm ngay trên <span class="font-oran">6385 địa điểm</span> - Miễn phí! </p>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p>Quản lý điều hành <span class="font-oran">(297)</span></p>

                    <p>Sales/ Marketing/ Guest Relation <span class="font-oran">(297)</span></p>

                    <p>Lễ tân/ Thu ngân/ Đặt phòng/ Tổng đài/ BC <span class="font-oran">(297)</span></p>

                    <p>Buồng/ Kho vải/ Giặt là/ VSCC/ Làm vườn <span class="font-oran">(297)</span></p>

                    <p>Ẩm thực/ Bàn/ Bar <span class="font-oran">(297)</span></p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <p>Hành chính/ Nhân sự/ Thư ký <span class="font-oran">(297)</span></p>

                    <p>Sales/ Marketing/ Guest Relation <span class="font-oran">(297)</span></p>

                    <p>Lễ tân/ Thu ngân/ Đặt phòng/ Tổng đài/ BC <span class="font-oran">(297)</span></p>

                    <p>Buồng/ Kho vải/ Giặt là/ VSCC/ Làm vườn <span class="font-oran">(297)</span></p>

                    <p>Ẩm thực/ Bàn/ Bar <span class="font-oran">(297)</span></p>

                    <p>Bếp/ Phụ bếp/ Rửa bát <span class="font-oran">(297)</span></p>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="messages">..sâsasa.</div>
        <div class="tab-pane" id="settings">..sâsasasa.</div>
    </div>
</div>

<div class="main-search">
    <p class="title">Tuyển dụng mới nhất<a href="#" class="pull-right"><img
                src="images/su-kien-tuyen-dung-tuan-nay.gif"></a></p>
</div>

<div class="main-new-recrui">
    <div class="module-float new-top">
        <div class="row">
            <div class="col-md-3 col-sm-3 text-center">Vị trí</div>
            <div class="col-md-2 col-sm-2">Mức lương</div>
            <div class="col-md-2 col-sm-2">Ngày đăng</div>
            <div class="col-md-2 col-sm-2">Địa điểm</div>
            <div class="col-md-3 col-sm-3 text-center">Nhà tuyển dụng</div>
        </div>
    </div>
    <div class="module-float">
        <div class="new-content">
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><a href="#">Phục vụ nam</a></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><a href="#">Phục vụ nam</a><span class="icon-hot"><img
                                src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><a href="#">Phục vụ nam</a><span class="icon-hot"><img
                                src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><a href="#">Phục vụ nam</a><span class="icon-hot"><img
                                src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3 hot"><a href="#">Phục vụ nam + phục vụ nữ + giám sát nhà hàng</a><span
                            class="icon-hot"><img src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><a href="#">Phục vụ nam + phục vụ nữ</a><span class="icon-hot"><img
                                src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3 hot"><a href="#">Phục vụ nam + phục vụ nữ</a><span
                            class="icon-hot"><img src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3 hot"><a href="#">Phục vụ nam + phục vụ nữ</a><span
                            class="icon-hot"><img src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 col-sm-3 hot"><a href="#">Phục vụ nam + phục vụ nữ</a><span
                            class="icon-hot"><img src="images/icon_new.gif"></span></div>
                    <div class="col-md-2 col-sm-2">Thảo thuận</div>
                    <div class="col-md-2 col-sm-2">02/10/2014</div>
                    <div class="col-md-2 col-sm-2">Hà Nội</div>
                    <div class="col-md-3 col-sm-3"><a href="#">Nhà hàng Yên Bình</a></div>
                </div>
            </div>
            <div class="item">
                <p class="new-all"><a href="#">Xem tất cả</a></p>
            </div>


        </div>
    </div>
</div>

<div class="main-new-recrui">
    <div class="module-float new-top">
        <p class="module-title">Tin tức mới nhất</p>
    </div>
    <div class="module-float">
        <div class="new-content">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6"></div>
        </div>
    </div>
</div>


</div>
<div class="col-md-3 col-sm-3 sidebar-left">
    <div class="item item-login">
        <div class="module-title-tab">Đăng nhập</div>
        <div class="item-ct">
            <div class="cv-login"><a href="#">Ứng viên đăng nhập</a></div>
            <p class="module-ct"><a href="#">Đăng ký tài khoản Ứng viên</a></p>

            <div class="tem-login"><span>+</span><a href="#">Nhà tuyển dụng đăng nhập</a></div>
            <p class="module-ct"><a href="#">Đăng ký tài khoản nhà tuyển dụng</a></p>
        </div>
    </div>
    <div class="item">
        <a href="#"><img src="images/aporicots2.gif"></a>
    </div>
    <div class="item discus">
        <div class="module-title-tab">Thảo luận</div>
        <div class="item-ct">
            <ul>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề dài thành 2 dòng thì như thế này</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây nếu dài thì như thế này</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
                <li><p class="title">Tiêu đề</p>

                    <p class="module-ct">Nội dung viết vào đây</p></li>
            </ul>
        </div>
    </div>

    <div class="item">
        <a href="#"><img src="images/su-kien-tuyen-dung.gif"></a>
    </div>

    <div class="item enquiry">
        <div class="module-title-tab">Hỏi đáp</div>
        <div class="item-ct">
            <ul>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li><p class="title"><a href="#"><i class="fa fa-angle-double-right"></i>Mình tạo hồ sơ không được</a>
                        <span class="font-oran">(38)</span></p>

                    <p class="module-ct font-oran">Người gửi: thanhbinhf</p></li>
                <li class="all-review"><p class="text-right"><a href="#">Xem tất cả</a></p></li>
            </ul>
        </div>
    </div>

    <div class="item">
        <div class="module-title-tab">Thăm dò ý kiến</div>
        <div class="item-ct">
            <p class="font-bold">Hãy cho chúng tôi biết về ý kiến của bạn và giải pháp tốt nhất phục vụ khách hiện
                nay?</p>

            <p class="font-gray font-bold">Bình chọn của bạn</p>

            <p><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Thành lập "Tình nguyện
                viên du lịch"</p>

            <p><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Thành lập "Đội trật tự
                du lịch"</p>

            <p><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Thành lập "Cảnh sát du
                lịch"</p>

            <p>
                <button type="button" class="btn btn-warning">Bình chọn</button>
                <button type="button" class="btn btn-warning"
                        style="padding-left: 20px;padding-right: 20px;margin-left: 10px">Kết quả
                </button>
            </p>
        </div>
    </div>

    <div class="item">
        <a href="#"><img src="images/Speraza.gif"></a>
        <a href="#"><img src="images/aporicots2.gif"></a>
        <a href="#"><img src="images/amnoi.GIF"></a>
        <a href="#"><img src="images/blue29.gif"></a>
        <a href="#"><img src="images/BELLA%20VITA%20HOTELS.jpg"></a>
        <a href="#"><img src="images/EN.jpg"></a>
        <a href="#"><img src="images/daanxbella-thanh-hoa.gif"></a>
        <a href="#"><img src="images/HANOI-ct-inn.GIF"></a>
        <a href="#"><img src="images/HN%20garden%20hotel.jpg"></a>
        <a href="#"><img src="images/GALLANT-HOTEL.gif"></a>
    </div>
</div>
</div>

<div class="lab-footer">
    <div class="module-float footer-slide">
        <div id="footer-slide" class="owl-carousel">
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/20143251058492.jpg"
                                               alt="Lazy Owl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014325111104.jpg"
                                               alt="Lazy dsOwl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014361716947.jpg"
                                               alt="Lazy Odsdsdswl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014951328814.jpg"
                                               alt="Lazy Owl Idsdsdsmage"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/20143251034347.jpg"
                                               alt="Lazy Owl Idsdsdsmage"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/20143251039146.jpg"
                                               alt="Lazy Owl Idsdsdsmage"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014325111104.jpg"
                                               alt="Lazy dsOwl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014951328814.jpg"
                                               alt="Lazy Owl Idsdsdsmage"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/20143251058492.jpg"
                                               alt="Lazy Owl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014325111104.jpg"
                                               alt="Lazy dsOwl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014361716947.jpg"
                                               alt="Lazy Odsdsdswl Image"></a></div>
            <div class="item"><a href="#"><img class="lazyOwl" src="images/imgdemo/2014951328814.jpg"
                                               alt="Lazy Owl Idsdsdsmage"></a></div>

        </div>
    </div>
    <div class="footer-nav">
        <div class="col-md-4 col-sm-4">
            <p class="title">Sản phẩm và dịch vụ</p>

            <p><a href="#">Quà tặng chào xuân 2014</a></p>

            <p><a href="#">Dịch vụ đăng tin tuyển dụng</a></p>

            <p><a href="#">Dịch vụ tuyển dụng theo yêu cầu</a></p>

            <p><a href="#">Dịch vụ quảng cáo </a></p>

            <p><a href="#">Dịch vụ tư vấn đầu tư và setup khách sạn</a></p>

            <p><a href="#">Dịch vụ tìm việc theo yêu cầu</a></p>
        </div>
        <div class="col-md-3 col-sm-3">
            <p class="title">Về chúng tôi</p>

            <p><a href="#">Giới thiệu hoteljob.vn</a></p>

            <p><a href="#">Thông báo mới hoteljob.vn</a></p>

            <p><a href="#">Quy định sử dụng</a></p>

            <p><a href="#">Góp ý</a></p>

            <p><a href="#">Tin rao vặt tuyển dụng</a></p>

            <p><a href="#">Liên hệ </a></p>
        </div>
        <div class="col-md-5 col-sm-5">
            <p>Add: <a href="#">97 Doan Ke Thien Str., Cau Giay Dict., Hanoi, Vietnam.</a></p>

            <p>Tel: <a href="#">84-4-66 7474 69</a> Fax: <a href="#">84-4-62814200</a></p>

            <p>Hotline: <a href="#">84 (0)98 352 9955</a></p>

            <p>Website: <a href="#">hoteljob.vn;</a> <a href="#" style="color: #2a00f4">chodokhachsan.com</a></p>

            <p style="margin-bottom: 10px">Email: <a href="#" style="color: #2a00f4">info@hoteljob.vn</a></p>

            <p>HCMC OFFICE</p>

            <p>Add: <a href="#">100 Ly Tu Trong Str., District 1, Ho Chi Minh City, Vietnam.</a></p>

            <p>Email: <a href="#" style="color: #2a00f4">hcmc@hoteljob.vn</a></p>
        </div>
    </div>
    <div class="footer-copy-right">
        <p class="text-center">GXNCC Số 76/GXN-TTĐT, của Bộ Thông tin & Truyền thông. </p>
    </div>
</div>
</div>
</section>
</body>
</html>