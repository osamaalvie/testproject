<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'helpers/Helpers.php';

// A function called on each tick event
function tick_handler()
{
    echo "tick_handler() called<br />";
}

register_tick_function('tick_handler');

class Welcome extends CI_Controller
{
    use Helpers;

// A function called on each tick event
    function tick_handler()
    {
        echo "tick_handler() called\n";
    }

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('utility');
        $this->load->library('params');


    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_
     * guide/general/urls.html
     */


    public $emps = ['name' => 'Osama Alvi', 'email' => 'osamaalvie@gmail.com'];

    // Name sorting function:
    public function name_sort($x, $y)
    {
        return strcasecmp($x['name'], $y['name']);
    }

// Grade sorting function:
    // Sort in DESCENDING order!
    public function grade_sort($x, $y)
    {
        return ($x['grade'] < $y['grade']);
    }

    public function index()
    {
       // $p = array_flip($this->emps);

        //print_r($p);

       // exit();
//        $transactionRef = "osama,javeria, adeel ,samia, marium";
//        $transactionRef = preg_split('/\s*,\s*/', trim($transactionRef));
//        $transactionRef = implode(",", $transactionRef);
//        $transactionRef = str_replace(",", ",<br />", $transactionRef);

//        header("Content-Type: application/pdf");
//        header('Content-Disposition:inline; filename="testing.pdf"');

        $this->load->view('welcome_message');
        //  uasort($this->emps, array($this, 'name_sort'));

//        foreach ($this->emps as $emp) {
//            echo $emp['name'] . '<br />';
//        }
//        declare(ticks = 1){
//            $a = 1;
//
//            if ($a > 0) {
//                // $a += 2;
//                // print($a . "<br />");
//            }
//        }

    }

}
