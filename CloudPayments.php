<?php

namespace nvlad\cloudpayments;

class CloudPayments extends \yii\base\Component
{
    const TYPE_CHARGE = 'charge';
    const TYPE_AUTH = 'auth';

    public $publicId;
    public $currency;
    public $apiKey;
    public $type = self::TYPE_CHARGE;
}
