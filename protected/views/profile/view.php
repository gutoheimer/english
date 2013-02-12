<?php
$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->firstName.' '.$model->lastName,
);
?>
<h3>My Profile</h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'firstName',
		'lastName',
		'nickName',
		'email',
		'dateBirth',
		'city',
		'phoneNumber',
		array('label'=>'Gender', 'value'=> (trim($model->gender)=='M') ? 'Male' : 'Female'),
	),
)); 

