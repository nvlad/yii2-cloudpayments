<?php

namespace nvlad\cloudpayments\widget;

use Yii;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * This is just an example.
 */
class CloudPayments extends \yii\base\Widget
{
    public $selector;
    public $type;

    public $publicId;
    public $description;
    public $amount;
    public $currency;
    public $invoiceId;
    public $accountId;
    public $email;
    public $data;

    public function run()
    {
        \nvlad\cloudpayments\Asset::register($this->view);

        $tmp = array_filter([
            'publicId' => $this->publicId,
            'description' => $this->description,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'invoiceId' => $this->invoiceId,
            'accountId' => $this->accountId,
            'email' => $this->email,
            'data' => $this->data,
        ]) + [
            'publicId' => Yii::$app->cloudPayments->publicId,
            'currency' => Yii::$app->cloudPayments->currency,
        ];

        $type = $this->type?:Yii::$app->cloudPayments->type;

        $this->view->registerJs('$("'.$this->selector.'").on("click", function(e) {
            var obj = $(this);
            var widget = new cp.CloudPayments();
            widget.'.$type.'('.Json::encode($tmp).', function(options) {
                obj.trigger("cloudpayments.success", [options]);
            }, function(reason, options) {
                obj.trigger("cloudpayments.fail", [reason, options]);
            });
            e.preventDefault();
        });');
    }
}
