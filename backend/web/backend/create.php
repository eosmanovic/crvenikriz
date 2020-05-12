<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Packs */

$this->title = Yii::t('app', 'Create Packs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
