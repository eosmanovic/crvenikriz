<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Packs */

$this->title = Yii::t('app', 'Ažuriraj paket: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paketi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Ažuriraj');
?>
<div class="packs-update">

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
