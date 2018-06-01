<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\system\Package;
use yii\helpers\ArrayHelper;
use rmrevin\yii\fontawesome\FA;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\system\PackageDetails */
/* @var $form yii\widgets\ActiveForm */
$PackageList= ArrayHelper::map(Package::find()->all(),'PackageID','PackageName');
$FontAwesomeList=FA::getConstants();
?>

<div class="package-details-form">
    <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <span style="float:left; width: 250px;margin-right: 5px">
    <?= $form->field($model, 'PackageID')->widget(Select2::classname(), [
                'data' => $PackageList,
                'language' => 'en',
                'options' => ['placeholder' => 'Select Package'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
    ])->label('Package'); ?>
                </span>
                <span style="float:left; width: 250px;margin-right: 5px">
    <?= $form->field($model, 'Package_Detail')->textInput(['maxlength' => true])->label("Details") ?>
                </span>
            </div>
            <div class="row">
                <span style="float:left; width: 250px;margin-right: 5px">
    <?= $form->field($model, 'icon')->widget(Select2::classname(), [
                'data' => $FontAwesomeList,
                'language' => 'en',
                'options' => ['placeholder' => 'Select Icon'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
                </span>
                <span style="float:left; width: 250px;margin-right: 5px">
                     <?= $form->field($model, 'url')->textInput() ?>
                </span>
            </div>
             <div class="row">
                 <span style="float:left; width: 250px;margin-right: 5px">
                    <?= $form->field($model, 'created_at')->textInput(['readonly'=>true])->label("Created_At") ?>
                 </span>
                <span style="float:left; width: 250px;margin-right: 5px">
                <?= $form->field($model, 'updated_at')->textInput(['readonly'=>true]) ?>
                </span>
             </div>
    <div class="row pull-right" style="padding-right: 65px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button style='margin-left: 5px' type='button' class='btn btn-secondary pull-left-sm' data-dismiss='modal'>Cancel</button>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>