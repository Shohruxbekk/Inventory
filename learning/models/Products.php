<?php

namespace app\models;

class Products extends \yii\db\ActiveRecord
{

    public static function tableName() {
        return 'products';

    }
    public function rules() {
        return [];
    }
}