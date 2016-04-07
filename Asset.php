<?php

namespace nvlad\cloudpayments;

class Asset extends \yii\web\AssetBundle
{
    public $js = [
        'https://widget.cloudpayments.ru/bundles/cloudpayments',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
