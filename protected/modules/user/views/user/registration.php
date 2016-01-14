<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>
<div class='row'>
<div class='col-sm-6 col-xs-12'>
	This is Customer signup. Are you a <?php echo CHtml::Link('restaurant',array('//restaurant/signup')); ?> brand
	<br/>
	<br/>
<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'contactform'),
)); ?>

	
	
	<?php //echo $form->errorSummary(array($model,$profile)); ?>
	
	<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	
		<?php echo $form->error($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $form->labelEx($profile,$field->varname); 
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->labelEx($profile,$field->varname); 
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('form-groups'=>6, 'cols'=>50,'placeholder'=>strip_tags($form->labelEx($profile,$field->varname))));
		} else {
			echo $form->textField($profile,$field->varname,array('placeholder'=>strip_tags($form->labelEx($profile,$field->varname)),'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		
		
			<?php
			}
		}
?>
	
	
	<?php //echo $form->labelEx($model,'username'); ?>
	<?php echo $form->error($model,'username'); ?>
	<?php echo $form->textField($model,'username',array('placeholder'=>'Username')); ?>
	

	
	
	<?php //echo $form->labelEx($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?>
	
	

	
	
	<?php //echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword',array('placeholder'=>'Retype Password')); ?>
	

	
	
	<?php //echo $form->labelEx($model,'email'); ?>
	<?php echo $form->error($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('placeholder'=>'Email')); ?>
	
	
	

	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
		<?php echo $form->error($model,'verifyCode'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		
		
		
	</div>
	<?php endif; ?>
	
	<div class="form-group submit">
		<?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
<?php endif; ?>