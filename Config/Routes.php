<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 5:05 PM
 */

namespace Framework\Config;


class Routes
{

    public static function getRoutes()
    {
        return [
            '/welcome/<:name *string>/<:age *integer>' => [
                'mappedPath' => '/user/index[name,age]'
            ]
        ];
    }

}