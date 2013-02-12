<?php /* @var $this Controller */

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<?php
Yii::app()->bootstrap->register();
?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/styles.css" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

		<?php 
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'inverse', 
		    'brandUrl'=>'/',
		    'fluid'=>true, 
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>'/'),
		                array('label'=>'Profile', 'url'=>CController::createUrl('/profile/view',array('id'=>Yii::app()->user->id))),
		                array('label'=>'Activities', 'url'=>array('/activity','id'=>Yii::app()->user->id)),
		            ),
		        ),
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		                array('label'=>Yii::app()->user->name, 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 
		                'items'=>array(
		                    array('label'=>'Logout', 'url'=>array('/site/logout')),
		                )),
		                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		            ),
		        ),
		    ),
		)); 
	?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

