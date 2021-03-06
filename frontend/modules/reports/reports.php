<?php 
namespace frontend\modules\reports;
/*
 * Project Name: eulims * 
 * Copyright(C)2018 Department of Science & Technology -IX * 
 * Developer: Eng'r Nolan F. Sunico  * 
 * 01 5, 18 , 4:53:24 PM * 
 * Module: module * 
 */

/**
 * Description of module
 *
 * @author OneLab
 */
class reports extends \yii\base\Module{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\reports\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        //adding sub-module
        $this->modules = [
            'lab' => ['class' => 'frontend\modules\reports\modules\lab\lab'],
            'finance'=>['class'=>'frontend\modules\reports\modules\finance\finance'],
            'customer'=>['class'=>'frontend\modules\reports\modules\customer\customer']
        ];

        // custom initialization code goes here
    }
}
