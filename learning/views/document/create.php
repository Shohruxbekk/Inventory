<?php
/** @var app\models\Document $model */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \yii\web\View $this */
use yii\helpers\Html;
?>


<?= $this->render('/document/_form', [
    'model' => $model,
    'dataProvider' => $dataProvider,
    'products' => $products,
]);
?>