<?php

namespace IriusDigital\LastLoginActivity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IriusDigital\LastLoginActivity\LastLoginActivity
 */
class LastLoginActivity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'last-login-activity';
    }
}
