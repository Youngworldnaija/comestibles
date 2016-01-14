<?php
/* @var $this MealController */
/* @var $model Meal */

$this->breadcrumbs=array(
	'Meals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Meal', 'url'=>array('index')),
	array('label'=>'Manage Meal', 'url'=>array('admin')),
);
?>

<h1>Create Meal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>