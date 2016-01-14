<?php
/* @var $this MealController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Meals',
);

$this->menu=array(
	array('label'=>'Create Meal', 'url'=>array('create')),
	array('label'=>'Manage Meal', 'url'=>array('admin')),
);
?>

<h1>Meals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
