<?php
/* @var $this MagazineController */
/* @var $model Magazine */

$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Create Magazine', 'url'=>array('create')),
	array('label'=>'Update Magazine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Magazine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

<h1>View Magazine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_registration',
		'dir',
	),
)); ?>
