<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 22/06/2020
 * Time: 12:54
 */

include APPPATH . 'vendor/autoload.php';

trait Helpers
{
    protected function prettyPrint(...$messages)
    {
        foreach ($messages as $message) {

            echo $message . "<br />";
        }
    }

    function dd()
    {
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }


}