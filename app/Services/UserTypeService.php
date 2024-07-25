<?php

namespace App\Services;

class UserTypeService
{
    public static function isAuth()
    {
        return auth()->check() ? true : false;
    }
    public static function isStudent()
    {
        return self::isAuth() ? (auth('tutor')->check() ? false : (auth()->user()->is_admin ? false : true)) : false;
    }

    public static function isTutor()
    {
        return self::isAuth() ? (auth('web')->check() ? false : true) : false; 
    }

}