<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

class Document extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            TimestampBehavior::class,
        ];
    }
 public static function tableName() {
     return 'document';
 }
 public function rules() {
     return [
         [['title', 'type','status'], 'required'],
     ];
 }
 public function getDocumentItems(){
     return $this->hasMany(DocumentItem::className(), ['document_id' => 'id']);
 }
}