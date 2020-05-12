<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use common\models\Pack;
use common\models\User;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use dosamigos\datepicker\DatePicker;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model common\models\Packs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packs-form">
    <div>
        <h3><?= $user->first_name ?> <?= $user->last_name ?></h3>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'body', ['options' => ['class' => '']])->widget(TinyMce::className(), [
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
        <label class="control-label">Datum</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'date',
            'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.m.yyyy'
                ]
        ]);?>
    </div>
    <div class="upload-pdf-triger">
        <?= $form->field($model, 'img')->widget(FileInput::classname(), ['options' => ['multiple' => false, 'accept' => 'image/*'],
            'pluginOptions'=>[
                'allowedFileExtensions'=>['jpg', 'png','jpeg'],
                'showUpload' => true,
                'initialPreview' => [
                    $model->img ? Html::img('@web/uploads/'.$model->img) : null, // checks the models to display the preview
                ],
                'overwriteInitial' => true,
            ],
        ])->label("Images") ?>           
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Spremi'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
