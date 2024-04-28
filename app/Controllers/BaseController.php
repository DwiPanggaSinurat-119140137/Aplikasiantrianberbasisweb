<?php

namespace App\Controllers;

use app\Models\PenggunaModel;
use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected $model;
    protected $model1;
    protected $request;
    protected $antrianmodel;
    protected $penggunamodel;

    public function __construct()
    {
        $this->model = new \App\Models\AntrianModel();
        $this->model1 = new \App\Models\LayananModel();
        $this->antrianmodel = new \App\Models\AntrianSttsModel();
        $this->penggunamodel = new \App\Models\PenggunaModel();
        $this->request = service('request');
    }

}
