<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

// https://jsonapi.org/format/#document-links-link-object

class Usaha extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usaha_model');

        //untuk menentukan limit dengan hitungan perJam
        $this->methods['index_get']['limit'] = 2000;
    }

    // contoh respone statis json

    //     $response['status'] = 200;
    //     $response['error'] = false;
    //     $response['user']['username'] = 'erthru';
    //     $response['user']['email'] = 'ersaka96@gmail.com';
    //     $response['user']['detail']['full_name'] = 'Suprianto D';
    //     $response['user']['detail']['position'] = 'Developer';
    //     $response['user']['detail']['specialize'] = 'Android,IOS,WEB,Desktop';

    //     $this->response($response);

    // public function index_get()
    // {
    //     $id = $this->get('id');
    //     if ($id === null) {
    //         $usaha = $this->Usaha_model->getUsaha();
    //     } else {
    //         $usaha = $this->Usaha_model->getUsaha($id);
    //     }
    //     // var_dump($usaha);
    //     // die();
    //     $data = [];

    //     foreach ($usaha as $row) {
    //         $data_product = [];
    //         $product = $this->Usaha_model->getProduk($row->id_product);

    //         foreach ($product as $produk) {
    //             $data_product[] = [
    //                 "id" => $produk->id,
    //                 "nama_product" => $produk->nama_product,
    //                 "jenis_product" => $produk->jenis_product,
    //                 "jumlah_produksi" => $produk->jumlah_produksi,
    //                 "harga_satuan" => $produk->harga_satuan,
    //                 "komoditas" => $produk->komoditas
    //             ];
    //         }

    //         $data[] = [
    //             "id" => $row->id,
    //             "SurelEmail" =>  $row->SurelEmail,
    //             "NamaLembaga" =>  $row->NamaLembaga,
    //             "NomorSuratKeputusan" =>  $row->NomorSuratKeputusan,
    //             "telpon" => $row->telpon,
    //             'product' => $data_product
    //         ];
    //     }


    // public function index_get()
    // {
    //     $id = $this->get('id');
    //     if ($id === null) {
    //         $usaha = $this->Usaha_model->getProduk();
    //     } else {
    //         $usaha = $this->Usaha_model->getProduk($id);
    //     }
    //     // var_dump($usaha);
    //     // die();
    //     $data = [];

    //     foreach ($usaha as $row) {
    //         $data_kups = [];
    //         $kups = $this->Usaha_model->getKups($row->id_kups);

    //         foreach ($kups as $produk) {
    //             $data_kups[] = [
    //                 "id" => $produk->id,
    //                 "Nama_kups" =>  $produk->Nama_kups,
    //                 "tahun_berdiri" =>  $produk->tahun_berdiri,
    //                 "Nomor_SK" =>  $produk->Nomor_SK,
    //                 "nama_izin" => $produk->nama_izin,
    //                 'Provinsi' => $produk->Provinsi,
    //                 'kabupaten' => $produk->kabupaten,
    //                 'Kecamatan' => $produk->Kecamatan,
    //                 'Desa' => $produk->Desa,
    //                 'Potensi' => $produk->Potensi,
    //             ];
    //         }

    //         $data[] = [
    //             "id" => $row->id,
    //             "nama_product" => $row->nama_product,
    //             "jenis_product" => $row->jenis_product,
    //             "jumlah_produksi" => $row->jumlah_produksi,
    //             "harga_satuan" => $row->harga_satuan,
    //             "komoditas" => $row->komoditas,
    //             'kups' => $data_kups
    //         ];
    //     }


    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $usaha = $this->Usaha_model->getKups();
        } else {
            $usaha = $this->Usaha_model->getKups($id);
        }
        // var_dump($usaha);
        // die();
        $data = [];

        foreach ($usaha as $kups) {
            $data_produk = [];
            $produk = $this->Usaha_model->getProduk($kups->id);

            foreach ($produk as $row) {
                $data_produk[] = [
                    "id" => $row->id,
                    "nama_product" => $row->nama_product,
                    "jenis_product" => $row->jenis_product,
                    "jumlah_produksi" => $row->jumlah_produksi,
                    "harga_satuan" => $row->harga_satuan,
                    "komoditas" => $row->komoditas,
                ];
            }

            $data[] = [
                "id" => $kups->id,
                "Nama_kups" =>  $kups->Nama_kups,
                "tahun_berdiri" =>  $kups->tahun_berdiri,
                "Nomor_SK" =>  $kups->Nomor_SK,
                "nama_izin" => $kups->nama_izin,
                'Provinsi' => $kups->Provinsi,
                'kabupaten' => $kups->kabupaten,
                'Kecamatan' => $kups->Kecamatan,
                'Desa' => $kups->Desa,
                'Potensi' => $kups->Potensi,
                'produk' => $data_produk
            ];
        }





        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data
            ], self::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], self::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id !'
            ], self::HTTP_BAD_REQUEST);
        } else {
            if ($this->Usaha_model->deleteUsaha($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], self::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found !'
                ], self::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'SurelEmail' => $this->post('SurelEmail'),
            'NamaLembaga' => $this->post('NamaLembaga'),
            'NomorSuratKeputusan' => $this->post('NomorSuratKeputusan'),
            'telpon' => $this->post('telpon'),
            'created_at' => time()
        ];

        if ($this->Usaha_model->createUsaha($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new usaha had been created'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failde to create new data !'
            ], self::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'SurelEmail' => $this->post('SurelEmail'),
            'NamaLembaga' => $this->post('NamaLembaga'),
            'NomorSuratKeputusan' => $this->post('NomorSuratKeputusan'),
            'telpon' => $this->post('telpon'),
            'created_at' => time(),
            'update_at'  => time()
        ];

        if ($this->Usaha_model->updateUsaha($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new usaha had been modify'
            ], self::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to modify new data !'
            ], self::HTTP_BAD_REQUEST);
        }
    }
}
