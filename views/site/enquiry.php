<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="row">
    <h6 class="section-title text-bold">ENQUIRE NOW</h6>

    <?php $form = ActiveForm::begin([
        'action' => ['enquiry'],
        'method' => 'post',
    ]); ?>

    <!-- Property Dropdown -->
    <div class="col-md-12">
        <?= $form->field($enquiry, 'property', [
            'template' => '<img src="' . Url::to('@web/web/assets/images/icons/plan.png') . '" class="input-icon">{input}{error}',
        ])->dropDownList([
            '' => 'Select a property',
            '1' => 'Property 1',
            '2' => 'Property 2',
            '3' => 'Property 3',
        ], ['class' => 'form-control', 'id' => 'property'])->label(false) ?>
    </div>

    <!-- Name Field -->
    <div class="col-md-12">
        <?= $form->field($enquiry, 'name', [
            'template' => '<img src="' . Url::to('@web/web/assets/images/icons/user.png') . '" class="input-icon">{input}{error}',
        ])->textInput(['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name', 'required' => true])->label(false) ?>
    </div>

    <!-- Phone Field -->
    <div class="col-md-12">
        <?= $form->field($enquiry, 'phone', [
            'template' => '<img src="' . Url::to('@web/web/assets/images/icons/flag.png') . '" class="input-icon">{input}{error}',
        ])->textInput(['class' => 'form-control', 'id' => 'phone', 'placeholder' => '+91', 'required' => true])->label(false) ?>
    </div>

    <!-- Email Field -->
    <div class="col-md-12">
        <?= $form->field($enquiry, 'email', [
            'template' => '<img src="' . Url::to('@web/web/assets/images/icons/mail.png') . '" class="input-icon">{input}{error}',
        ])->input('email', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail', 'required' => true])->label(false) ?>
    </div>

    <!-- Message Field -->
    <div class="col-md-12">
        <?= $form->field($enquiry, 'message', [
            'template' => '<img src="' . Url::to('@web/web/assets/images/icons/message.png') . '" class="input-icon">{input}{error}',
        ])->textarea(['rows' => 4, 'class' => 'form-control', 'id' => 'message', 'placeholder' => 'Message', 'required' => true])->label(false) ?>
    </div>

    <!-- Consent Checkbox -->
    <div class="form-check col-md-12">
        <label>
            <input type="checkbox" id="consent-checkbox" required>
            <small>I authorize Company representative to Call, SMS, Email, or Whatsapp me about the products and offers. This consent overrides any registration for DNC/NDNC.</small>
        </label>
    </div>

    <!-- Submit Button -->
    <div class="col-md-12">
        <?= Html::submitButton('Enquire Now', ['class' => 'btn btn-primary mt-3 w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
