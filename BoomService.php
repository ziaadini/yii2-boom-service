<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\Exception;
use yii\httpclient\Client;
use yii\web\NotFoundHttpException;

/**@property Client $guzzleClient */
//for more info  Visit https://portal.faraboom.co/fa/help/api#2
class BoomService extends Component
{
    //config
    public string $deviceId;
    public string $authorization; //'Basic your-token'
    public int $appKey;
    public string $tokenId;
    public string $bankId;
    public string $username;
    public string $password;
    public $phoneNumberIdentityField = "username";
    public $meta = [];

    public function init()
    {
        parent::init();
        $this->setMeta();
    }

    private function setMeta()
    {
        $this->meta = [
            'Accept-Language' => 'fa',
            'CLIENT-USER-ID' => Yii::$app->user->identity->{$this->phoneNumberIdentityField},
            'CLIENT-IP-ADDRESS' => Yii::$app->request->userIP,
            'CLIENT-DEVICE-ID' => Yii::$app->request->userIP,
            'CLIENT-PLATFORM-TYPE' => 'WEB',
            'CLIENT-USER-AGENT' => Yii::$app->request->userAgent
        ];
    }
    public function test()
    {
        return "this is a test";
    }
}
