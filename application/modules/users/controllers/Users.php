<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14/05/2020
 * Time: 14:10
 */
class Users extends MX_Controller
{
    /**
     * Users constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->helper('download');


    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Users';
        $data['users'] = $this->user_model->get_users();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/users/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function message($message="Test Message")
    {
        echo $message;
    }

    /**
     * @param null $status
     */
    public function status($status = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Active Users';
        $data['users'] = $this->user_model->get_status($status);

        if (empty($data['users'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/users/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {

        } else {
            $this->user_model->set_user();
            $data['users'] = $this->user_model->get_status(null);


        }

        redirect('/users', 'refresh');

    }
}