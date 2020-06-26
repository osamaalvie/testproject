<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/05/2020
 * Time: 15:12
 */
class Plog_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_entry($data)
    {
        $this->error_level    = $data['error_level']; // please read the below note
        $this->error_description  = $data['error_description'];
        $this->created_at     = time();
        $this->updated_at     = time();

        $this->db->insert('logs', $this);
    }
}