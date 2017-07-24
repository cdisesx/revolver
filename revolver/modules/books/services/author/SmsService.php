<?php

namespace demo\services\api;

use Yii;
use app\components\base\Service;

/**
 * Sms api service
 */
class SmsService extends Service
{
    /**
     * Send message
     *
     * @param $mobile
     * @param $content
     * @return bool
     */
    public function send($mobile, $content)
    {
        // just demo
        if (false) {
            $params = [
                'mobile' => $mobile,
                'content' => $content,
            ];

            $resp = Yii::$app->client->get('sms', 'send', $params);

            if ($resp->hasError()) {
                Yii::error($resp->getBody());
                return false;
            }
        }

        sleep(2);

        Yii::info([$mobile, $content]);

        return true;
    }
}
