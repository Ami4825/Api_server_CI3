<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Produk extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usaha_model');

        //untuk menentukan limit dengan hitungan perJam
        $this->methods['index_get']['limit'] = 2000;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $usaha = $this->Usaha_model->getProduk();
        } else {
            $usaha = $this->Usaha_model->getProduk($id);
        }
        // var_dump($usaha);
        // die();

        if ($usaha) {
            $this->response([
                'status' => true,
                'data' => $usaha
            ], self::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], self::HTTP_NOT_FOUND);
        }
    }
}
