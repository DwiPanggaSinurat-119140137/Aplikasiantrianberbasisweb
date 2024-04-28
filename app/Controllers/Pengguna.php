<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use App\Models\PenggunaModel;
use CodeIgniter\I18n\Time;

class Pengguna extends BaseController
{
    public function index()
    {
        $tanggal = Time::now('Asia/Jakarta')->toDateString();
        $antriansaatini = $this->model->where("tanggal", $tanggal)->where("status", "Antrian")->orderBy("nomor", "asc")->orderBy("jam", "desc")->first();

        $data = [

            'antriansaatini' => $antriansaatini,

        ];

        return view('pengguna/dashboard', $data);
    }
    protected $pengguna;
    protected $antrianmodel;
    protected $model1;
    protected $model;
    public function cekpengguna($jam)
    {
        $tanggal = Time::now('Asia/Jakarta')->toDateString();
        $antrian = $this->model->where("tanggal", $tanggal)->where("jam", $jam)->countAllResults();
        $jsonResult = json_encode($antrian);

        echo $jsonResult;
    }
    public function pengguna()
    {

        $pengguna = $this->penggunamodel->findAll();
        $antrianstatus = $this->antrianmodel->findAll();
        $layanan = $this->model1->findAll();
        $data = [
            'pengguna' => $pengguna,
            'antrianstatus' => $antrianstatus,
            'layanan' => $layanan,
        ];
        return view('pengguna/antrian-form', $data);
    }
    public function antrianform()
    {
        return view('pengguna/antrian-form');
    }
}
