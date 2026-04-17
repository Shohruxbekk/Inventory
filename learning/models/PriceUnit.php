<?php

namespace app\models;

class PriceUnit extends \yii\db\ActiveRecord
{

    public static function tableName() {
        return 'price_unit';
    }
    public function rules() {
        return [];

    }
}