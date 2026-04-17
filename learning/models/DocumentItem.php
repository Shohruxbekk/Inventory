<?php

namespace app\models;

class DocumentItem extends \yii\db\ActiveRecord
{
public static function tableName() {
    return 'document_item';
}
public function rules() {
    return [
        [['product','quantity','quantity_unit','price','price_unit'], 'required'],
    ];
}
public function getDocument() {
    return $this->hasOne(Document::className(), ['id' => 'document_id']);

}
}