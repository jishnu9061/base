<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/08/19
 * Time: 20:19:53
 * Description: CommonHelper.php
 */

namespace App\Helpers;

class CommonHelper
{
    public static function hashPassword($password)
    {
        return bcrypt($password);
    }
}
