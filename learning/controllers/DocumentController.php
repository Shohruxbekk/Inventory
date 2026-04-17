<?php

namespace app\controllers;

use app\models\Document;
use app\models\DocumentItem;
use app\models\DocumentSearch;
use app\models\Products;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;
use yii\web\Controller;

class DocumentController extends Controller
{
 public function actionIndex() {
     $searchModel = new DocumentSearch();
     $dataProvider = new ActiveDataProvider([
         'query' => Document::find(),
         'pagination' => [
             'pageSize' => 20,

         ]
     ]);
     return $this->render('index', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
     ]);
 }
 public function actionView($id) {
     $model = Document::findOne($id);
     return $this->render('view', [
         'model' => $model,
     ]);
 }
 public function actionCreate() {
     $model = new Document();
     $itemModel = [new DocumentItem()];
     if($model->load(Yii::$app->request->post())) {
         $data = Yii::$app->request->post('DocumentItem');
         $modelItems = [];
         foreach ($data as $i => $item) {
             $modelItems[$i] = new DocumentItem();
         }
         if(Model::loadMultiple($modelItems, Yii::$app->request->post())) {
             $valid = $model->validate();
             $valid = Model::validateMultiple($modelItems) && $valid;
             if($valid) {
                 $transaction = Yii::$app->db->beginTransaction();
                 try{
                     $model->save();
                     foreach ($modelItems as $modelItem) {
                         $modelItem->document_id = $model->id;
                         $modelItem->save();
                     }
                     $transaction->commit();
                     return $this->redirect(['view', 'id'=> $model->id]);


                 }
                 catch (\Exception $e) {
                     $transaction->rollBack();
                     throw $e;
                 }
             }
         }
     }
     $products = Products::find()->all();
     $products = ArrayHelper::map($products, 'id', 'name');
     $dataProvider = new ActiveDataProvider([
         'query' => DocumentItem::find(),
  'pagination' => [],
         ]);
  return $this->render('create', ['dataProvider' => $dataProvider,'products'=>$products, 'model' => $model, 'itemModel' => $itemModel]);
 }
 public function actionUpdate($id) {
 $model = Document::findOne($id);
 $itemModel = $model->documentItems;
 if($model->load(Yii::$app->request->post())) {
     $data = Yii::$app->request->post('DocumentItem');
     $modelItems = [];
     foreach ($data as $i => $item) {
         $modelItems[$i] = new DocumentItem();

     }
     if(Model::loadMultiple($modelItems, Yii::$app->request->post())) {
         $valid = $model->validate();
         $valid = Model::validateMultiple($modelItems) && $valid;
         if($valid) {
             $transaction = Yii::$app->db->beginTransaction();
             try{
                 $model->save();
                 DocumentItem::deleteAll(['document_id' => $id]);
                 foreach ($modelItems as $modelItem) {
                     $modelItem->document_id = $id;
                     $modelItem->save();

                 }
                 $transaction->commit();
                 return $this->redirect(['view', 'id' => $model->id]);

             }
             catch (\Exception $e) {
                 $transaction->rollBack();

             }
         }
     }
 }
 $products = Products::find()->all();
 $products = ArrayHelper::map($products, 'id', 'name');

  $dataProvider = new ActiveDataProvider([
      'query' => DocumentItem::find(),
      'pagination' => [
          'pageSize' => 20,

      ]

  ]);
 return $this->render('update', ['model' => $model,'products'=>$products, 'itemModel' => $itemModel, 'dataProvider' => $dataProvider]);
 }
 public function actionDelete($id) {
     DocumentItem::deleteAll(['document_id' => $id]);
     $model = Document::findOne($id);
     $model->delete();

     return $this->redirect(['index']);
 }
}