<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class='row'>
<div class='col-sm-6 col-xs-12'>
<div class="form">
	<div class='contactform'>
<?php echo CHtml::beginForm(); ?>

	
	
	<?php echo CHtml::errorSummary($model); ?>
	
	
		<?php //echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'Username or Email')) ?>
	
	
	
		<?php //echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'Password')) ?>
	
	
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>

	<div class="checkbox">
		<label>
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			Remember Me
				<?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?>
			
		
		</label>
	</div>

	<div class="submit">
		<?php echo CHtml::submitButton(UserModule::t("Login"),array('class'=>'btn btn-primary')); ?>
	</div>
	
<?php echo CHtml::endForm(); ?>
	</div>
</div><!-- form -->
</div>
</div>

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>