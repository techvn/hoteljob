<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::t('login_translator', 'CPanel HotelJob - Login');

?>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="container-fluid">
        <div id="page-login" class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                <div class="box">
                    <div class="box-content">
                        <div class="text-center">
                            <h3 class="page-header"><?php echo Yii::t('login_translator', 'Login') ?></h3>
                        </div>
                        <?php
                        // Validation
                        if($model->getErrors()) {
                            foreach($model->getErrors() as $error) {
                                echo "<p class='bg-danger'>$error[0]</p>";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" id="username" class="form-control" name="LoginForm[username]" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="LoginForm[password]" />
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#username').focus();
    });
</script>
