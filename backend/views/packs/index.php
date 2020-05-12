<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PacksQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Paketi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packs-index">

    <h1>Paketi</h1>

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
            ['label' => 'Naslov',
               'attribute' => "title",
               'value' => function ($data){ return $data->title; },
            ],
            ['label' => 'Datum',
               'attribute' => "date",
               'value' => function ($data){ return $data->date; },
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
