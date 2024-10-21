<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Change Password';
?>

<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<div class="row">
		<div class="col-lg-5">

			<?php $form = ActiveForm::begin([
				'id' => 'changepassword-form',
				'fieldConfig' => [
					'template' => "{label}\n{input}\n{error}",
					'labelOptions' => ['class' => 'col-lg-6 col-form-label mr-lg-3'],
					'inputOptions' => ['class' => 'col-lg-6 form-control'],
					'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
				],
			]); ?>

			<?= $form->field($model, 'current_password')->passwordInput(['maxlength' => true, 'placeholder' => 'Current password....']) ?>


			<?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true, 'placeholder' => 'New Password....']) ?>

			<?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true, 'placeholder' => 'Confimpassword....']) ?>


			<?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-lg-3', 'name' => 'changepassword-button']) ?>

			<?php ActiveForm::end(); ?>

		</div>
	</div>
</div>
<style>
	.invalid-feedback{
		display: block;
	}
</style>