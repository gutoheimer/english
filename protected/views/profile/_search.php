<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'avatar',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'firstName',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'lastName',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'nickName',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'dateBirth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'phoneNumber',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
