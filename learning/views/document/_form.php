<?php
use yii\helpers\Html;
use unclead\multipleinput\MultipleInput;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
/** @var app\models\Document $model  */

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>
<?= $form->field($model, 'type')->widget(Select2::class, [
        'name' => 'type',
    'options' => ['placeholder' => 'Select a type ...'],
    'data' => [
            1=>'income',
        2=>'outcome',
    ]]) ?>
<?= $form->field($model, 'status')->widget(Select2::class, [
        'name' => 'status',
    'options' => ['placeholder' => 'Select a status ...'],
    'data' => [
            1=>'active',
        2=>'inactive',
    ]
]) ?>
<?= MultipleInput::widget([
    'name' => "DocumentItem",
    'addButtonOptions' => ['class' => 'btn btn-success','label' => '+'],
    'removeButtonOptions' => ['class' => 'btn btn-danger','label' => '-'],
    'columns' => [
        [
            'name' => 'product',
            'type' => Select2::class,
            'options' => [

             'data'=> $products
            ]
        ],
        [
                'name' => 'quantity',
            'type' => 'textInput',

        ],
            [
                    'name' => 'quantity_unit',
                    'type' => Select2::class,
                'options' => [
                        'data'=>[
                                1=>'tonne',
                               2=>'kg',
                               3=>'gram'
                        ]
                ]

            ],


            [
                    'name' => 'price',
                    'type' => 'textInput',
            ],
            [
                    'name' => 'price_unit',
                    'type' => Select2::class,
                    'options' => [
                            'data'=>[
                                 1=>'som',
                                2=>'dollar'
                            ]
                    ]

            ],

    ]
  ]);
    ?>
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>


<?php ActiveForm::end(); ?>
