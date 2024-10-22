<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="row">
    <h6 class="section-title text-bold text-dark">ENQUIRE NOW</h6>

    <?php $form = ActiveForm::begin([
        'action' => ['enquiry'],
        'method' => 'post',
    ]); ?>

    <!-- Property Dropdown -->
    <div class="form-group col-md-12">
        <?= $form->field($enquiry, 'property')->dropDownList([
            '' => 'Select a property',
            '1' => 'Property 1',
            '2' => 'Property 2',
            '3' => 'Property 3',
        ], ['class' => 'form-control', 'id' => 'property'])->label(false) ?>
    </div>

    <!-- Name Field -->
    <div class="form-group position-relative col-md-12">
        <?= $form->field($enquiry, 'name')->textInput(['class' => 'form-control', 'id' => 'name', 'required' => true])->label(false) ?>
        <span class="placeholder-icon"><img src="<?= Url::to('@web/web/assets/images/icons/user.png'); ?>"> Name</span>
    </div>

    <!-- Email and Phone in 2 Columns -->
    <div class="row">
        <!-- Phone Field -->
        <div class="form-group position-relative col-md-6">
            <?= $form->field($enquiry, 'phone')->textInput(['class' => 'form-control', 'id' => 'phone', 'required' => true])->label(false) ?>
            <span class="placeholder-icon"><img src="<?= Url::to('@web/web/assets/images/icons/flag.png'); ?>"> +91</span>
        </div>

        <!-- Email Field -->
        <div class="form-group position-relative col-md-6">
            <?= $form->field($enquiry, 'email')->input('email', ['class' => 'form-control', 'id' => 'email', 'required' => true])->label(false) ?>
            <span class="placeholder-icon"><img src="<?= Url::to('@web/web/assets/images/icons/mail.png'); ?>"> E-mail</span>
        </div>
    </div>

    <!-- Message Field -->
    <div class="form-group position-relative col-md-12">
        <?= $form->field($enquiry, 'message')->textarea(['rows' => 4, 'class' => 'form-control', 'id' => 'message', 'required' => true])->label(false) ?>
        <span class="placeholder-icon"> Message</span>
    </div>

    <!-- Consent Checkbox -->
    <div class="form-group form-check col-md-12">
        <label>
            <input type="checkbox" id="consent-checkbox" required>
            <small>I authorize Company representative to Call, SMS, Email, or Whatsapp me about the products and offers. This consent overrides any registration for DNC/NDNC.</small>
        </label>
    </div>

    <!-- Submit Button -->
    <div class="form-group col-md-12">
        <?= Html::submitButton('Enquire Now', ['class' => 'btn btn-primary mt-3 w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>