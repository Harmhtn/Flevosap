<?php


class Request
{
    public static function uri()
    {
        return trim(parse_url($_GET['url'], PHP_URL_PATH), '/');
    }
}
