<?php

namespace App\Helpers;

class ToastrHelper
{
    public static function success($message)
    {
        session()->flash('toastr', ['type' => 'success', 'message' => $message]);
    }

    public static function error($message)
    {
        session()->flash('toastr', ['type' => 'error', 'message' => $message]);
    }

    public static function warning($message)
    {
        session()->flash('toastr', ['type' => 'warning', 'message' => $message]);
    }

    public static function info($message)
    {
        session()->flash('toastr', ['type' => 'info', 'message' => $message]);
    }
}
