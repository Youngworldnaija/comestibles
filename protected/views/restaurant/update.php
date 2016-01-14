<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Restaurant', 'url'=>array('index')),
	array('label'=>'Create Restaurant', 'url'=>array('signup')),
	array('label'=>'View Restaurant', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Restaurant', 'url'=>array('admin')),
);
?>

<h1>Update Restaurant <?php echo $model->id; ?></h1>
<div class='row'>
<div class='col-md-6 col-xs-12'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
	<div class="col-md-4">
     <?php $this->widget('application.widgets.PassportHeaderWidget', array('user' => $model)); ?>
</div>
</div>