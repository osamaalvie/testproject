<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/05/2020
 * Time: 13:46
 */
class Logs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->library('');
//        log_message("info", "Log Info Message Testing");
//        log_message("error", "Log Error Message Testing");
//        log_message("debug", "Log Debug Message Testing");

        $this->load->helper('file');
        $this->load->model('plog_model');


    }

    public function index()
    {
        // $this->load->library("migration");

//        if (!$this->migration->current()) {
//            echo 'Error' . $this->migration->error_string();
//        } else {
//            echo 'Migrations ran successfully!';
//        }

        $path = './application/logs/log-2020-05-19.log';

        if (file_exists($path)) {

            $string = read_file($path);
            $array = explode(PHP_EOL, $string);


            foreach ($array as $item) {
                echo $item . "<br />";
//                echo $item . "<br />";
                // $row = explode(array('-', '-->'), $item);
                if(!empty($item)){
                    $row = explode("-",$item,2);
                    $level = $row[0];
                    $row = preg_split("/(-->)/", $row[1],2);

                    $data = [];
                    print_r($row);
                }

                // echo  count($row);
//                if (count($row) === 2) {
//                    $data['error_level'] = 'Info';
//                    $data['error_description'] = $data[2];
//                    $data['created_at'] = $row[1];
//                }
//                elseif(count($row) === 3){
//                    $data['error_level'] =  $data[2];
//                    $data['error_description'] = $data[3];
//                    $data['created_at'] = $row[1];
//                }
//
//                if(count($data)){
//                    $this->plog->insert_entry($data);
//                }
//
//                $this->plog->insert_entry($data);

                echo  "<br />"."--------------";
                echo  "<br />";
            }
        } else {
            log_message("error", "Log Error Message Testing");
        }


        //echo json_encode($array);

    }
}