<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Ime") ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Prezime") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Email") ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Adresa") ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Grad") ?>

    <?= $form->field($model, 'id_card')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Broj lične karte") ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("JMBG") ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true, 'autocomplete' => 'off'])->label("Telefon") ?>

    <?= $form->field($model, 'description', ['options' => ['class' => '']])->widget(TinyMce::className(), [
        'options' => ['rows' => 10],
        'language' => 'hr',
        'clientOptions' => [
            'branding' => false,
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ])->label("Opis");?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Spremi Unos'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
