<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */
/* @var $form CActiveForm */
//var_dump($this->getPageState('guid'));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurantform-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'contactform'),
	'stateful'=>true,
)); ?>

	<p class="note">This is Restaurant signup. Are you a <?php echo CHtml::Link('normal user',array('//user/registration')); ?> ?</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'placeholder'=>'Name')); ?>
		<?php echo $form->error($model,'name'); ?>
	
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100,'placeholder'=>'Telephone Number')); ?>
		<?php echo $form->error($model,'phone'); ?>
	
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'placeholder'=>'Email Address')); ?>
		<?php echo $form->error($model,'email'); ?>
	
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255,'placeholder'=>'Office Address')); ?>
		<?php echo $form->error($model,'address'); ?>
	


	<div class="buttons">
		<?php echo CHtml::htmlButton($model->isNewRecord ? 'Next<i class="fa fa-arrow-circle-right fa-lg"></i>' : 'Save',array('class'=>'btn btn-primary','name'=>'choice','type'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->