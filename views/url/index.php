<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\UrlSearch */

$this->title = 'Urls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Url', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            [
                'label' => 'Short Url',
                'format' => 'url',
                'value' => function($data){
                    return Url::home(true) . $data->short_url;
                }

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
