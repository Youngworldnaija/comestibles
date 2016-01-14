<?php
/* @var $this UserFormController */
/* @var $model UserForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	'Signup',
);

?>
<div class='clearfix'><div id='arrow' class='pull-left'></div><h1>Create New Admin User</h1></div>
<div class='row'>
<div class='col-md-6 col-xs-12'>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form-createuser-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('class'=>'contactform'),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textField($model,'firstname',array('placeholder'=>$model->attributeLabels()['firstname'])); ?>
		<?php echo $form->error($model,'firstname'); ?>
	
		<?php echo $form->textField($model,'lastname',array('placeholder'=>$model->attributeLabels()['lastname'])); ?>
		<?php echo $form->error($model,'lastname'); ?>

		<?php echo $form->textField($model,'userEmail',array('placeholder'=>$model->attributeLabels()['email'])); ?>
		<?php echo $form->error($model,'email'); ?>
	
		<?php echo $form->textField($model,'username',array('placeholder'=>$model->attributeLabels()['username'])); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php echo $form->passwordField($model,'password',array('placeholder'=>$model->attributeLabels()['password'])); ?>
		<?php echo $form->error($model,'password'); ?>
	
		<?php echo $form->passwordField($model,'verifyPassword',array('placeholder'=>$model->attributeLabels()['verifyPassword'])); ?>
		<?php echo $form->error($model,'verifyPassword'); ?>
	

	<div class="row">
	<div class="buttons col-md-6">
		<?php echo CHtml::htmlButton('<i class="fa fa-arrow-circle-left fa-lg"></i>Back',array('type'=>'submit','class'=>'btn btn-primary','name'=>'backtochoice')); ?>
	</div>
	<div class="buttons col-md-6">
		<?php echo CHtml::htmlButton('Done<i class="fa fa-arrow-circle-right fa-lg"></i>',array('type'=>'submit','class'=>'btn btn-primary','name'=>'done')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>