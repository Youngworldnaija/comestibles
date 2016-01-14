<?php
/* @var $this ChoiceFormController */
/* @var $model ChoiceForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	'Signup',
);
//var_dump($this->getPageState('guid'));
//var_dump($extra);
?>
<div class='clearfix'><div id='arrow' class='pull-left'></div><h1>Choose Administrator</h1></div>
<div class='row'>
<div class='col-md-6 col-xs-12'>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'choice-form-choice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('class'=>'contactform'),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->radioButtonList($model,'choice',$model->getChoices(),array('separator'=>'<hr>','template'=>"<div class='radio'><label>{input}  <span  class='marginal'>  {label}</span></label></div>",'container' => 'div' )); ?>
		<?php echo $form->error($model,'choice'); ?><br/>
	<div class="row">
	<div class="buttons col-md-6">
		<?php echo CHtml::htmlButton('<i class="fa fa-arrow-circle-left fa-lg"></i>Back',array('name'=>'details','type'=>'submit','class'=>'btn btn-primary')); ?>
	</div>
	<div class="buttons col-md-6">
		<?php echo CHtml::htmlButton('Next<i class="fa fa-arrow-circle-right fa-lg"></i>',array('name'=>'displaychoice','type'=>'submit','class'=>'btn btn-primary')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>