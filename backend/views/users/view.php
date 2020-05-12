<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Korisnik'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= $model->first_name ?> <?= $model->last_name ?></h1>


    <div  class="product-header">
        <div>&nbsp;&nbsp;</div>
        <div class="right-header">
            <div>
                <?= Html::a('Dodaj Paket', ['packs', "id" => $model->id], ['class' => 'btn btn-success']) ?>
            </div>
            <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-trash"></span>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Da li ste sigurni da želite izbrisati?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-list-alt"></span>'), ['pdf/view', 'id' => $model->id], ['class' => 'btn btn-success btn-mobile-position', 'data-toggle' =>"tooltip", 'title'=> "Zakljucaj !"]) ?>
        </div>
    </div>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label' => 'Ime',
               'attribute' => "first_name",
               'value' => function ($data){ return $data->first_name; },
            ],
            ['label' => 'Prezime',
               'attribute' => "last_name",
               'value' => function ($data){ return $data->last_name; },
            ],
            ['label' => 'Adresa',
               'attribute' => "address",
               'value' => function ($data){ return $data->address; },
            ],
            ['label' => 'Lična karta',
               'attribute' => "id_card",
               'value' => function ($data){ return $data->id_card; },
            ],
            ['label' => 'JMBG',
               'attribute' => "zip_code",
               'value' => function ($data){ return $data->zip_code; },
            ],
            ['label' => 'Telefon',
               'attribute' => "tel",
               'value' => function ($data){ return $data->tel; },
            ],
        ],
    ]) ?>
    <?php if( $model->description ): ?>
        <div class="description-wrapp">
            <h4>Dodatne informacije: </h4>
            <?= $model->description; ?>
        </div>
    <?php endif ?>
    <div class="packages">
        <?php foreach ($packs as $key => $pack ): ?>
            <table class="table table-striped table-hover table-bordered table-mobile">
                <tbody>
                    <tr>
                        <td>Naslov</td>
                        <td>
                            <strong><?= $pack->title ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Opis</td>
                        <td><?= $pack->body ?></td>
                    </tr>
                    <tr>
                        <td>Datum</td>
                        <td><strong><?= $pack->date ?></strong></td>
                    </tr>
                    <?php if( $pack->img ): ?>
                        <tr>
                            <td>Slika</td>
                            <td>
                                <a href="<?= "http://localhost/crveni-kriz/backend/web/uploads/".$pack->img; ?>" target="_blank">
                                    <?= Html::img( "@web/uploads/".$pack->img, ['class' => 'img-link']);?>
                                </a>
                            </td>
                    </tr>
                    <?php endif ?>
                    <tr>
                        <td>&nbsp;&nbsp;</td>
                        <td><?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span>'), ['/packs/update', 'id' => $pack->id], ['class' => 'btn btn-primary']) ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>
</div>
