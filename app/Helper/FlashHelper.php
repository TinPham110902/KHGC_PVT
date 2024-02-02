<?php

namespace App\Helper;

use Illuminate\Support\Facades\Session;

class FlashHelper
{
    public static function flashMessage($type, $message)
    {
        Session::flash('type', $type);
        Session::flash('alert', $message);
    }
}