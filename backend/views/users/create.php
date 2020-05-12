<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnici'), 'url' => ['index']];
$this->params['breadcrumbs'][] = "novi korisnik";
?>
<div class="user-create">

    <h1>Dodaj korisnika</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
