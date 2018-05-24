<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\lab\Lab;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\lab\LabManager */
/* @var $form yii\widgets\ActiveForm */

$SQL="SELECT `tbl_profile`.`user_id`,CONCAT(fnProperCase(`firstname`),' ',LEFT(UCASE(`middleinitial`),1) ,'. ',fnProperCase(`lastname`)) AS LabManager
FROM `tbl_profile` INNER JOIN `tbl_auth_assignment` ON(`tbl_auth_assignment`.`user_id`=`tbl_profile`.`user_id`)
WHERE `item_name`='lab-manager'";
$Connection= Yii::$app->db;
$Command=$Connection->createCommand($SQL);
$LabmanagerList=$Command->queryAll();
?>

<div class="lab-manager-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'lab_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Lab::find()->asArray()->all(), 'lab_id', 'labname'),
            'language' => 'en-gb',
            'options' => ['placeholder' => 'Select a Laboratory'],
            'pluginOptions' => [
                'allowClear' => true,
                'disabled' => false,
            ],
        ])->label('Laboratory');
        ?>

    <?php
        echo $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($LabmanagerList, 'user_id', 'LabManager'),
            'language' => 'en-gb',
            'options' => ['placeholder' => 'Select Lab Manager'],
            'pluginOptions' => [
                'allowClear' => true,
                'disabled' => true,
            ],
        ])->label('Lab Manager');
        ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
    <div class="form-group pull-right">
        <?php if(Yii::$app->request->isAjax){ ?>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
        <?php } ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
