<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	'Signup',

);

//$this->menu=array(
//	array('label'=>'List Restaurant', 'url'=>array('index')),
//	array('label'=>'Manage Restaurant', 'url'=>array('admin')),
//);
//var_dump($extra);
?>

<div class='clearfix'><div id='arrow' class='pull-left'></div><h1>Restaurant Details</h1></div>
<div class='row'>
<div class='col-md-6'>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
	<div class='col-md-2'></div>
<div class="col-md-3">
     <?php $this->widget('application.widgets.PassportHeaderWidget', array('user' => $model)); ?>
</div>
</div>