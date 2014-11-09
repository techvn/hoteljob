<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 11/8/14
 * Time: 4:28 PM
 */

$country_arr = array('0' => Yii::t('application', 'Select country'));
foreach($country as $c) {
    $country_arr[$c->id] = $c->name;
}
?>
<div class="form-group">
    <?php echo $form->labelEx($model, 'fullname', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'fullname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'fullname'); ?>
    </div>
    <div class="col-sm-4">
        <?php
        $avatar = Yii::app()->request->baseUrl . ($model->avatar ? Yii::app()->params['avatarDir'] . $model->avatar : '/uploads/avatar.jpg');
        ?>
        <img id="avatar-img" src="<?php echo $avatar ?>" style="width: 200px"/>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'birth', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2 has-feedback">
        <?php echo $form->textField($model, 'birth', array('class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Birth'))); ?>
        <span class="fa fa-calendar form-control-feedback"></span>
        <?php echo $form->error($model, 'birth'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'gender', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo $form->dropDownList($model, 'gender', array(
                '1' => Yii::t('application', 'Male'),
                '0' => Yii::t('application', 'Female')
            ), array('class' => 'form-control')
        ); ?>
        <?php echo $form->error($model, 'gender'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'married', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo $form->dropDownList($model, 'married', array(
            '0' => Yii::t('application', 'Single'),
            '1' => Yii::t('application', 'Married')
        ), array('class' => 'form-control'), array('options' => array($model->married => array('selected' => true)))); ?>
        <?php echo $form->error($model, 'married'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'nationality', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php
        $nationality = $country_arr; //array_merge(array('0' => Yii::t('application', 'Select country')), $country);
        /*if ($locations) {
            foreach ($locations as $k => $v) {
                if ($v->parent_id == 0) {
                    $nationality[$v->id] = $v->name;
                }
            }
        }*/
        echo $form->dropDownList($model, 'nationality', $nationality, array('class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'nationality'); ?>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'avatar', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->fileField($model, 'avatar'); ?>
        <?php echo $form->error($model, 'avatar'); ?>
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function() {
        var avatarName = '<?php echo $model->avatar ?>';
        $('#ytMembers_avatar').val(avatarName);

        LoadTimePickerScript(function () {
            var dateConfig = {setDate: new Date()};
            <?php if(Yii::app()->language == 'vi') {
            ?>
            dateConfig.dateFormat = 'dd/mm/yy'
            <?php
            } ?>
            $('#Members_birth').datepicker(dateConfig);
        });
    })
</script>