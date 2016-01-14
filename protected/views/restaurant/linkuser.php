<?php
/* @var $this LinkFormController */
/* @var $model LinkForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	'Signup',
);

?>

<div class='clearfix'><div id='arrow' class='pull-left'></div><h1>Link Admin User Account</h1></div>
<div class='row'>
<div class='col-md-6 col-xs-12'>
<div class="form">
	

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form-linkuser-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('class'=>'contactform'),
)); ?>

	<p class="note">Enter the account details of the user you wish to link with this restaurant for administration.</p>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textField($model,'linkUsername',array('placeholder'=>$model->attributeLabels()['username'])); ?>
		<?php echo $form->error($model,'linkUsername'); ?>
	
		<?php echo $form->passwordField($model,'linkPassword',array('placeholder'=>$model->attributeLabels()['password'])); ?>
		<?php echo $form->error($model,'linkPassword'); ?>
	
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