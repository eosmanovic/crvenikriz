<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Packs */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paketi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="packs-view">

    <div  class="product-header">
        <h3><?= $user->first_name ?> <?= $user->last_name ?>, Paket: <?= $model->title ?></h3>
        <div class="right-header">
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-trash"></span>'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Da li ste sigurni da želite izbrisati?'),
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </div>

    <table class="table table-striped table-hover table-bordered table-mobile">
        <tbody>
            <tr>
                <td class="table-title">Naslov</td>
                <td>
                    <?= $model->title ?>
                </td>
            </tr>
            <tr>
                <td class="table-title">Opis</td>
                <td><?= $model->body ?></td>
            </tr>
            <tr>
                <td class="table-title">Datum</td>
                <td><?= $model->date ?></td>
            </tr>
            <tr>
                <td class="table-title">Slika</td>
                <td>
                    <a href="<?= "http://localhost/crveni-kriz/backend/web/uploads/".$model->img; ?>" target="_blank">
                        <?= Html::img( "@web/uploads/".$model->img, ['class' => 'img-link']);?>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="table-title"></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
