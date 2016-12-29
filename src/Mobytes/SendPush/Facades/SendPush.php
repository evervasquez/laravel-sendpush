<?php
/**
 * Created by PhpStorm.
 * User: ever
 * Date: 12/29/16
 * Time: 10:36 AM
 */

namespace Mobytes\SendPush\Facades;
use Illuminate\Support\Facades\Facade;

class SendPush extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'sendpush'; }
}