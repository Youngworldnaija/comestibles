<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Restaurant', 'url'=>array('index')),
	array('label'=>'Create Restaurant', 'url'=>array('signup')),
	array('label'=>'Update Restaurant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Restaurant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Restaurant', 'url'=>array('admin')),
);
?>

<h1>View Restaurant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'key',
		'address',
		'email',
		'phone',
		'owner_id',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	),
)); ?>
