<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 9:51 PM
 */
?>
<ul class="nav navbar-nav pull-right panel-menu">
    <!--<li class="hidden-xs">
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
    </li>-->

    <li class="dropdown">
        <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
            <div class="avatar">
                <?php
                $avatar = Yii::app()->request->baseUrl . (Yii::app()->user->getState('avatar') ? Yii::app()->params['avatarDir'] . Yii::app()->user->getState('avatar') : '/uploads/avatar.jpg');
                ?>
                <img
                    src="<?php echo  $avatar; //Yii::app()->request->baseUrl ?>"
                    class="img-rounded" alt="avatar"/>
            </div>
            <i class="fa fa-angle-down pull-right"></i>

            <div class="user-mini pull-right">
                <span class="welcome"><?php echo Yii::t('dashboard_translator', 'Welcome') ?>,</span>
                <span><?php echo Yii::app()->user->getName() ?></span>
            </div>
        </a>
        <ul class="dropdown-menu">
            <li>
                <?php $profileUrl = Yii::app()->createUrl('members/update', array('id' => Yii::app()->user->userId)); ?>
                <a href="<?php echo $profileUrl ?>">
                    <i class="fa fa-user"></i>
                    <span class="hidden-sm text"><?php echo Yii::t('dashboard_translator', 'Profile') ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->request->baseUrl ?>/backend.php?r=site/logout">
                    <i class="fa fa-power-off"></i>
                    <span class="hidden-sm text"><?php echo Yii::t('dashboard_translator', 'Logout') ?></span>
                </a>
            </li>
        </ul>
    </li>
</ul>