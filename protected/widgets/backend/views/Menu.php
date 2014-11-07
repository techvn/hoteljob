<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 7:37 PM
 */
$baseUrl = Yii::app()->request->baseUrl;
?>
<ul class="nav main-menu">
<li>
    <a href="<?php echo $baseUrl ?>/backend.php" class="active ajax-link">
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
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('members/admin') ?>">
                <?php echo Yii::t('backend_menu', 'User Manage') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('members/create') ?>">
                <?php echo Yii::t('backend_menu', 'New User') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('membersGroup/admin')?>">
                <?php echo Yii::t('backend_menu', 'Manage Group') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('membersGroup/update') ?>">
                <?php echo Yii::t('backend_menu', 'New Group') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('members/update', array('id' => Yii::app()->user->userId)) ?>">
                <?php echo Yii::t('backend_menu', 'Profile') ?>
            </a></li>
        <li><a class="ajax-link__" href="#">
                <?php echo Yii::t('backend_menu', 'User Log') ?>
            </a></li>
        <li><a class="ajax-link__" href="#">
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
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('organizeManager/admin') ?>">
                <?php echo Yii::t('backend_menu', 'List Recruiters') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('organizeManager/create') ?>">
                <?php echo Yii::t('backend_menu', 'New Recruiter') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('newsCategory/admin') ?>">
                <?php echo Yii::t('backend_menu', 'List Categories') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('newsCategory/create') ?>">
                <?php echo Yii::t('backend_menu', 'New Category') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('news/admin') ?>">
                <?php echo Yii::t('backend_menu', 'List News') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('news/create') ?>">
                <?php echo Yii::t('backend_menu', 'Add News') ?>
            </a></li>
        <li><a class="ajax-link__" href="#">
                <?php echo Yii::t('backend_menu', 'Recruitment Manage') ?>
                <!--Danh sách đăng tuyển-->
            </a></li>
        <li><a class="ajax-link__" href="#">
                <?php echo Yii::t('backend_menu', 'Recruitment comment') ?>
                <!--Comment đăng tuyển-->
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobApplies/admin') ?>">
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
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('newsCategory/admin&option=sys') ?>">
                <?php echo Yii::t('backend_menu', 'List Categories') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('newsCategory/create&option=sys') ?>">
                <?php echo Yii::t('backend_menu', 'New Category') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('news/admin&option=sys') ?>">
                <?php echo Yii::t('backend_menu', 'List News') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('news/create&option=sys') ?>">
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
        <!--<li><a class="ajax-link__" href="<?php /*echo Yii::app()->createUrl('members/admin') */?>">
                <?php /*echo Yii::t('backend_menu', 'List Member') */?>
            </a></li>
        <li><a class="ajax-link__" href="<?php /*echo Yii::app()->createUrl('members/create') */?>">
                <?php /*echo Yii::t('backend_menu', 'Add Member') */?>
            </a></li>-->
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('') ?>">
                <?php echo Yii::t('backend_menu', 'List Curriculum Vitae') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('curriculumPrivate/admin') ?>">
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
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('faqsQuestion/admin') ?>">
                <?php echo Yii::t('backend_menu', 'List FAQs') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('faqsQuestion/create') ?>">
                <?php echo Yii::t('backend_menu', 'Add FAQ') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('faqsCategory/admin') ?>">
                <?php echo Yii::t('backend_menu', 'FAQs Categories') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('faqsCategory/create') ?>">
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
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('locations/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Country Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Country Manage') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobLevel/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Level Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Level Manage') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('skill/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Skill Computer Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Skill Computer') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobSalary/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Salary Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Salary Manage') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('securityQuestion/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Security Question') ?>">
                <?php echo Yii::t('backend_menu', 'Security Question') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('companyScope/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Scope Manage') ?>">
                <?php echo Yii::t('backend_menu', 'Scope Manage') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobMajor/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Jobs Major') ?>">
                <?php echo Yii::t('backend_menu', 'Jobs Major') ?>

            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobType/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Jobs Type') ?>">
                <?php echo Yii::t('backend_menu', 'Jobs Type') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('jobTime/admin') ?>"
               title="<?php echo Yii::t('backend_menu', 'Work Time') ?>">
                <?php echo Yii::t('backend_menu', 'Work Time') ?>
            </a></li>
        <li><a class="ajax-link__" href="<?php echo Yii::app()->createUrl('currency/admin') ?>"
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
        <li><a class="ajax-link" href="#"
               title="<?php echo Yii::t('backend_menu', 'List Adv') ?>">
                <?php echo Yii::t('backend_menu', 'List Adv') ?>
            </a></li>
        <li><a class="ajax-link" href="#"
               title="<?php echo Yii::t('backend_menu', 'Add Adv') ?>">
                <?php echo Yii::t('backend_menu', 'Add Adv') ?>
            </a></li>
    </ul>
</li>

</ul>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebar-left a').each(function() {
            if($(this).prop('href') == window.location.href) {
                $(this).addClass('active-parent active');
                // Find parent actived
                if($(this).parent().prop('tagName') == 'LI') {
                    $(this).parent().parent().css('display', 'block');
                    $(this).parent().parent().parent().find('.dropdown-toggle').addClass('active-parent active');
                }
                return false;
            }
        })
    })
</script>