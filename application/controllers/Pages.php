<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14/05/2020
 * Time: 12:53
 */
class Pages extends CI_Controller
{

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'About';

        $this->load->view('pages/'.$page,$data);
    }

}