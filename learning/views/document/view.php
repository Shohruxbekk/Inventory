<?php

use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\DetailView; ?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',
        [
            'attribute'=>'type',
            'value'=>function($model){
    $type = $model->type;
    $result='';
    if($type==1){
        $result='income';
    }
    else{
        $result='outcome';
    }
    return $result;
            }

        ],
        [
            'attribute'=>'status',
            'value'=>function($model){
    $status = $model->status;
    $result='';
    if($status==1){
        $result='active';

    }
    else{
        $result='inactive';
    }
    return $result;
            }
        ],

    ]
]);?>

<?= GridView::widget([
    'dataProvider' => new ActiveDataProvider([
        'query'=> \app\models\DocumentItem::find()->where(['document_id'=> $model->id])
    ]),
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute'=>'product',
            'value'=>function($model){
    $product = Products::findOne($model->product);
    return $product ? $product->name: '';

            }
        ],
        'quantity',

        [
            'attribute' => 'quantity_unit',
            'value' => function($model){
    $unit = $model->quantity_unit;
    $result = '';
    if($unit == 1){
        $result = 'tonne';
    }
    else if($unit == 2){
        $result = 'kg';
    }
    else if($unit == 3){
        $result = 'gram';
    }
    return $result;
            }

        ],
        'price',
        [
            'attribute' => 'price_unit',
            'value' => function($model){
    $unit = $model->price_unit;
    $result = '';
    if($unit == 1){
        $result = 'dollar';

    }
    else if($unit == 2){
        $result = 'som';

    }
    return $result;

            }
        ],
    ]
]) ?>