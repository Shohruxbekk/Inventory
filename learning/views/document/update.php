<?php
/** @var app\models\Document $model */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \yii\web\View $this */

echo $this->render('form', [
    'model' => $model,
    'dataProvider' => $dataProvider,
    'products' => $products,
]);