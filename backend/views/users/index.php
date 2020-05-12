<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Korisnici');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div  class="product-header">
        <h1>Korisnici</h1>
        <div class="right-header">
        <div>
            <?= Html::a('Dodaj Korisnika', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
            <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-list-alt"></span>'), ['pdf/index'], ['class' => 'btn btn-success btn-mobile-position', 'data-toggle' =>"tooltip", 'title'=> "Kreiraj PDF !"]) ?>
        </div>
    </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            [
                'format' => 'raw',
                'label' => 'Paket',
                'value' => function($model, $key, $index, $column) {
                        return Html::a(
                            '+',
                            Url::to(['users/packs', "id" => $model->id]), 
                            [
                                'id'=>'grid-custom-button',
                                'data-pjax'=>true,
                                'action'=>Url::to(['users/packs', "id" => $model->id]),
                                'class'=>'glyphicon glyphicon-glyphicon-plus',
                                'data-toggle' =>"tooltip",
                                'title'=> "Dodaj Paket",
                            ]
                        );
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'id' => 'theDatatable',
            'class'=>'table table-striped table-bordered table-grid-view table-grid-view-customers'
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
