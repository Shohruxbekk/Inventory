<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
?>
<?=
Html::a('create new', ['create'], ['class' => 'btn btn-success'])
?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        'type',
        'status',
        ['class' => 'yii\grid\ActionColumn']
    ]
]) ?>
