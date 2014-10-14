<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 7:37 PM
 */
?>
<ul class="nav main-menu">
<li>
    <a href="<?php echo Yii::app()->request->baseUrl ?>/backend.php" class="active ajax-link">
        <i class="fa fa-dashboard"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'Dashboard') ?></span>
    </a>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'System Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_xcharts.html">
                <?php echo Yii::t('backend_menu', 'User Manage') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_flot.html">
                <?php echo Yii::t('backend_menu', 'New User') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Manage Group') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'New Group') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_morris.html">
                <?php echo Yii::t('backend_menu', 'Profile') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'User Log') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Login History') ?>
            </a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'Recruiter Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List Recruiters') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'New Recruiter') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List Categories') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'New Category') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List News') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Add News') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Recruitment Manage') ?>
                <!--Danh sách đăng tuyển-->
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Recruitment comment') ?>
                <!--Comment đăng tuyển-->
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Apply Manage') ?>
                <!--Danh sách nộp đơn-->
            </a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'HotelJob News Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List Categories') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'New Category') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List News') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Add News') ?>
            </a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'Member Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List Member') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Add Member') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List Curriculum Vitae') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Curriculum Private') ?>
            </a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'FAQs Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'List FAQs') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Add FAQ') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'FAQs Categories') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html">
                <?php echo Yii::t('backend_menu', 'Add FAQ category') ?>
            </a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'Information Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Country Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Country Manage') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Level Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Level Manage') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Salary Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Salary Manage') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Security Question') ?>">
                <?php echo Yii::t('backend_menu', 'Security Question') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Scope Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Scope Manage') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Jobs Major') ?>">
                <?php echo Yii::t('backend_menu', 'Jobs Major') ?>

            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Jobs Type') ?>">
                <?php echo Yii::t('backend_menu', 'Jobs Type') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Work Time') ?>">
                <?php echo Yii::t('backend_menu', 'Work Time') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Currency Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Currency Manage') ?>
            </a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs"><?php echo Yii::t('backend_menu', 'Advertisement Manage') ?></span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'List Adv') ?>">
                <?php echo Yii::t('backend_menu', 'List Adv') ?>
            </a></li>
        <li><a class="ajax-link" href="ajax/charts_google.html"
               title="<?php echo Yii::t('backend_menu', 'Add Adv') ?>">
                <?php echo Yii::t('backend_menu', 'Add Adv') ?>
            </a></li>
    </ul>
</li>

</ul>