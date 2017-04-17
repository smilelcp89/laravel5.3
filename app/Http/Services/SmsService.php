<?php

namespace app\Http\Services;

class SmsService
{
    public function send($email)
    {
        return iconv('utf-8','gbk','发送邮件给：' . $email . '成功');
    }
}
