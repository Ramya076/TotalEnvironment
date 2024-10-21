<?php
use yii\widgets\ActiveForm;

$this->title = 'Enquire Now';
?>
<div class="enquiry-form py-5">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Enquire Now</h1>
        
        <?php $form = ActiveForm::begin(['id' => 'enquiry-form']); ?>
        
        <?= $form->field($model, 'property')->dropDownList([
            '1' => 'Property 1',
            '2' => 'Property 2',
            '3' => 'Property 3'
        ], ['prompt' => 'Select Property']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'email')->input('email') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
