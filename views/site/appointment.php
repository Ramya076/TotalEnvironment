<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="form-wrapper">
                        <h2>Book an Appointment</h2>
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'project')->dropDownList([
                            'In That Quiet Earth' => 'In That Quiet Earth',
                            'Pursuit of a Radical Rhapsody' => 'Pursuit of a Radical Rhapsody',
                        ], ['prompt' => 'Choose Project'])->label(false) ?>

                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name'])->label(false) ?>
                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your Email'])->label(false) ?>
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Your Phone Number'])->label(false) ?>
                        <?= $form->field($model, 'message')->textarea(['rows' => 4, 'placeholder' => 'Message'])->label(false) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit Now', ['class' => 'btn btn-block']) ?>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="consent-checkbox" required>
                                <small>I authorize company representatives to call, SMS, email, or WhatsApp me about its
                                    products and offers. This consent overrides any registration for DNC/NDNC.</small>
                            </label>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
