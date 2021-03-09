<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Flash extends Model
{
    public static function success($msn)
    {
        Session::put('type', 'success');
        Session::put('message', $msn);
    }

    public static function info($msn)
    {
        Session::put('type', 'info');
        Session::put('message', $msn);
    }

    public static function warning($msn)
    {
        Session::put('type', 'warning');
        Session::put('message', $msn);
    }

    public static function error($msn)
    {
        Session::put('type', 'danger');
        Session::put('message', $msn);
    }
}
