<?php

use \CILogViewer\CILogViewer;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/05/2020
 * Time: 10:14
 */
class LogViewerController extends CI_Controller
{
    private $logViewer;

    public function __construct()
    {
        parent::__construct();

        $this->logViewer = new CILogViewer();

    }

    public function index()
    {
        echo $this->logViewer->showLogs();
        return;
    }

}