<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 9:51 PM
 */
?>
<ul class="nav navbar-nav pull-right panel-menu">
    <li class="hidden-xs">
        <a href="index.html" class="modal-link">
            <i class="fa fa-bell"></i>
            <span class="badge">7</span>
        </a>
    </li>
    <li class="hidden-xs">
        <a class="ajax-link" href="ajax/calendar.html">
            <i class="fa fa-calendar"></i>
            <span class="badge">7</span>
        </a>
    </li>
    <li class="hidden-xs">
        <a href="ajax/page_messages.html" class="ajax-link">
            <i class="fa fa-envelope"></i>
            <span class="badge">7</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
            <div class="avatar">
                <img
                    src="<?php echo Yii::app()->request->baseUrl ?>/assets/backend/img/avatar.jpg"
                    class="img-rounded" alt="avatar"/>
            </div>
            <i class="fa fa-angle-down pull-right"></i>

            <div class="user-mini pull-right">
                <span class="welcome">Welcome,</span>
                <span>Jane Devoops</span>
            </div>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="hidden-sm text">Profile</span>
                </a>
            </li>
            <li>
                <a href="ajax/page_messages.html" class="ajax-link">
                    <i class="fa fa-envelope"></i>
                    <span class="hidden-sm text">Messages</span>
                </a>
            </li>
            <li>
                <a href="ajax/gallery_simple.html" class="ajax-link">
                    <i class="fa fa-picture-o"></i>
                    <span class="hidden-sm text">Albums</span>
                </a>
            </li>
            <li>
                <a href="ajax/calendar.html" class="ajax-link">
                    <i class="fa fa-tasks"></i>
                    <span class="hidden-sm text">Tasks</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="hidden-sm text">Settings</span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->request->baseUrl ?>/backend.php?r=site/logout">
                    <i class="fa fa-power-off"></i>
                    <span class="hidden-sm text">Logout</span>
                </a>
            </li>
        </ul>
    </li>
</ul>