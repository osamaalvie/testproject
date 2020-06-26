<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15/05/2020
 * Time: 12:52
 */
class Post extends CI_Controller
{
//    public function _remap($method, $params = array())
//    {
//
//        show_404();
//    }

    public function _output($output)
    {
        //exit(3);
        echo 5;
    }

    public function all()
    {
        echo "All";
    }

    public function find()
    {
        echo "Find";
    }

}