<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14/05/2020
 * Time: 14:04
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_status($status = 'active')
    {
        if ($status === null) {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('status' => $status));
        return $query->result_array();
    }

    public function set_user()
    {
        //$this->load->helper('url');

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status')
        );

        return $this->db->insert('users', $data);
    }
}