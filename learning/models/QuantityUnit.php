<?php

namespace app\models;

class QuantityUnit extends \yii\db\ActiveRecord
{

    public static function tableName() {
        return 'quantity_unit';
    }
    public function rules() {
        return [];
    }
}