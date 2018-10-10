<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.10
 * Time: 19.38
 */

namespace Book\Util;

class UrlBuilder
{
    public static function buildUrl($origin, $pathName, $queryParams = [])
    {
        $url = $origin . $pathName;
        if ($queryParams) {
            $url .= "?" . http_build_query($queryParams);
        }

        return $url;
    }
}