<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true, 
	'clientOptions'=>array('validateOnSubmit'=>true)
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($user); ?>

	<?php echo $form->textFieldRow($model,'firstName',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'lastName',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'nickName',array('class'=>'span5','maxlength'=>80)); ?>

    <?php echo $form->labelEx($model,'dateBirth'); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model' => $model, // Model object
		'attribute' => 'dateBirth',
		'options' => array(
		        'mode' => 'date',
		        'changeYear' => true,
		        'changeMonth' => true,
		        'yearRange' => '1980:2020',
		        'dateFormat' => 'dd MM yy',
		        'timeFormat' => '',
		        'showTimepicker' => false,
		        'visible'=>false
		),
	    'htmlOptions' => array(
                'class'=>'span5 input' . ( $model->getError('birthDate')  ? ' error' : '')
        ),
	));
	
	?>
	
    <?php echo $form->error($model,'dateBirth'); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'phoneNumber',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->dropDownListRow($model,'gender',array('M'=>'Male','F'=>'Female'),array('prompt'=>'Select an option', 'class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->passwordFieldRow($user,'password',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->passwordFieldRow($user,'passwordConfirm',array('class'=>'span5','maxlength'=>50)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
