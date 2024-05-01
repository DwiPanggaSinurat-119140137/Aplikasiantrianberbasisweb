<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{

    public function index()
    {
        $tanggal = Time::now('Asia/Jakarta')->toDateString();
        $antriansaatini = $this->model->where("tanggal", $tanggal)->where("status", "Antrian")->orderBy("nomor", "asc")->orderBy("jam", "desc")->first();
        $antrian = $this->model->where("tanggal", $tanggal)->where("status", "Antrian")->orderBy("nomor", "desc")->findAll();

        // Memeriksa apakah $antriansaatini tidak null sebelum mengakses $jumlahantrian
        if ($antriansaatini !== null) {
            $jumlahantrian = $this->model->where("tanggal", $tanggal)->where("status", "Antrian")->where("jam", $antriansaatini['jam'])->orderBy("nomor", "desc")->first();
        } else {
            $jumlahantrian = [];
        }

        $data = [
            'antrian' => $antrian,
            'antriansaatini' => $antriansaatini,
            'jumlahantrian' => $jumlahantrian,
        ];
        return view('admin/dashboard', $data);
    }

    protected $antrianmodel;
    public function antrian()
    {
        $antrianstatus = $this->antrianmodel->findAll();
        $data = [
            'antrianstatus' => $antrianstatus,
        ];
        return view('admin/antrian', $data);
    }
    public function layanan()
    {
        $layanan = $this->model1->findAll();
        $data = [
            'layanan' => $layanan,
        ];
        return view('/admin/layanan', $data);
    }
    protected $model;
    public function rekapitulasi()
    {
        $antrian = $this->model->where("status", "Selesai")->findAll();
        $data = [
            'antrian' => $antrian,
        ];
        return view('/admin/rekapitulasi', $data);
    }
    public function selesai()
    {
        $this->model->update(esc($this->request->getVar('id')), ['status' => "Selesai"]);
        return redirect()->to('/admin/dashboard');
    }
    public function batal()
    {
        $this->model->delete(esc($this->request->getVar('id')));
        return redirect()->to('/admin/dashboard');
    }
    public function addantrian()
    {
        $tanggal = Time::now('Asia/Jakarta')->toDateString();

        // Tentukan aturan validasi dan pesan kustom
        $rules = [
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf]',
                'max_size[file,10240]',
            ],
        ];

        $messages = [
            'file' => [
                'mime_in' => 'File harus berbentuk PDF.',
                'max_size' => 'File tidak boleh lebih dari 10MB.',
            ],
        ];

        // Validasi file
        if (!$this->validate($rules, $messages)) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->to('/pengguna/antrian-form')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            // File valid, lanjutkan proses unggah
            $pdf = $this->request->getFile('file');
            $pdf->move('pdf');
            $file = $pdf->getName();

            $data = [
                'no_hp' => esc($this->request->getVar('no_hp')),
                'nama_layanan' => esc($this->request->getVar('nama_layanan')),
                'jam' => esc($this->request->getVar('jam')),
                'nama_mahasiswa' => esc($this->request->getVar('nama_mahasiswa')),
                'nim' => esc($this->request->getVar('nim')),
                'nomor' => esc($this->request->getVar('nomor')),
                'tanggal' => $tanggal,
                'file' => $file,
                'status' => 'Antrian',
            ];

            $now = Time::now('Asia/Jakarta')->getHour();
            $results = $this->antrianmodel->like('jam_antrian', '10')->findAll();
            $test = end($results);
            $result = $this->antrianmodel->where('jam_antrian', esc($this->request->getVar('jam')))->first();
            if ($test['id'] <= $result['id'] && $data['nomor'] <= $result['maksimal']) {
                $this->model->insert($data);
                return redirect()->to('/pengguna/dashboard');

            } else {
                if ($data['nomor'] >= $result['maksimal']) {
                    session()->setFlashdata('error', 'Nomor Antrian telah melewati batas maksimal');
                    return redirect()->to('/pengguna/antrian-form');

                } else {
                    session()->setFlashdata('error', 'Nomor Antrian telah melewati jam sekarang');
                    return redirect()->to('/pengguna/antrian-form');

                }

                // session()->setFlashdata('error', 'Nomor Antrian telah melewati jam sekarang');
                // return redirect()->to('/pengguna/antrian-form');
            }

        }
    }

    protected $model1;
    public function addlayanan()
    {
        $data = [
            'nama_layanan' => esc($this->request->getVar('nama_layanan')),
            'deskripsi' => esc($this->request->getVar('deskripsi')),
        ];
        $this->model1->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/layanan');
    }
    public function editlayanan()
    {
        $data = [
            'nama_layanan' => esc($this->request->getVar('nama_layanan')),
            'deskripsi' => esc($this->request->getVar('deskripsi')),
        ];
        $this->model1->update(esc($this->request->getVar('id')), $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/layanan');
    }
    public function deletelayanan()
    {
        $this->model1->delete(esc($this->request->getVar('id')));
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/layanan');
    }
    public function status()
    {
        $this->antrianmodel->update(esc($this->request->getVar('id')), ['status' => esc($this->request->getVar('status'))]);
        return redirect()->to('/admin/antrian');
    }
    public function statusotomatis($jam)
    {

        $result = $this->antrianmodel->where('jam_antrian', $jam)->first();
        $this->antrianmodel->update(($result['id']), ['status' => "OFF"]);
        return redirect()->to('/admin/antrian');
    }
    public function pergantianhari()
    {
        $this->antrianmodel->set("status", "ON")->where("id >", 0)->update();

        return redirect()->to('/admin/antrian');
    }
    public function pesan()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => esc($this->request->getVar('no_hp')),
                'message' => 'Silahkan Masuk ke dalam ruangan',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: auDDMUiI8g6BFLMpH-FV', //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        return redirect()->to('admin/dashboard');
    }
    public function unduhrekapitulasi($bulan)
    {
        $antrian = $this->model->where("status", "Selesai")->like("tanggal", $bulan)->findAll();
        $autoScript = "window.print();";
        $data = [
            'antrian' => $antrian,
            'autoScript' => $autoScript,
        ];

        return view('/admin/unduhrekapitulasi', $data);
    }
    public function updatejumlah()
    {
        $this->antrianmodel->update(esc($this->request->getVar('id')), ['maksimal' => esc($this->request->getVar('maksimal'))]);
        return redirect()->to('/admin/antrian');
    }

}
