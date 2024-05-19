<?php

namespace App\Controllers;

use App\Models\TanyaModel;
use App\Models\LaporanModel;
use App\Models\AdminModel;
use App\Models\TindakModel;
use App\Models\SurveyModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    var $tanya, $validation, $model, $lapor, $tindak, $survey;
    function __construct()
    {
        $this->tanya = new TanyaModel();
        $this->model = new AdminModel();
        $this->lapor = new LaporanModel();
        $this->tindak = new TindakModel();
        $this->survey = new SurveyModel();
        $this->validation = \Config\Services::validation();
        helper("cookie");
        helper("global_fungsi_helper");
    }
    public function index()
    {

        return view('web/index');
    }
    public function nilai()
    {
        // Menghitung jumlah JK dengan nilai 1, hanya dihitung sekali untuk setiap kombinasi nik dan created_at
        $countJK = $this->survey->countDistinctJK();
        $countPR = $this->survey->countDistinctPR();
        $data['counts'] = $this->survey->countAllByEducation();

        // Menghitung jumlah opsi yang berbeda
        $countOption1 = $this->survey->countOption1();
        $countOption2 = $this->survey->countOption2();
        $countOption3 = $this->survey->countOption3();
        $countOption4 = $this->survey->countOption4();

        // Mengambil data grup yang berbeda
        $data['data'] = $this->survey->groupDistinct();

        // Menggabungkan semua data ke dalam array $data
        $data = [
            'countOption1' => $countOption1[0]['option1'],
            'countOption2' => $countOption2[0]['option2'],
            'countOption3' => $countOption3[0]['option3'],
            'countOption4' => $countOption4[0]['option4'],
            'countJK' => $countJK, // Menambahkan jumlah JK dengan nilai 1
            'countPR' => $countPR, // Menambahkan jumlah JK dengan nilai 1
            'data' => $data['data'],
            'counts' => $data['counts'],
        ];

        return view('web/nilai', $data);
    }

    public function faq()
    {
        return view('web/faq');
    }
    public function contact()
    {
        return view('web/contact');
    }
    public function survey()
    {
        $data['action'] = "add";
        $data['tanya'] = $this->tanya->findAll();
        return view('web/survey', $data);
    }
    // public function submitskm()
    // {
    //     $action = $this->request->getVar('action');
    //     switch ($action) {
    //         case "add":
    //             $requestData = $this->request->getVar();
    //             $requestData['created_at'] = date('Y-m-d H:i:s');
    //             $this->survey->insert($requestData);
    //             return $this->respond([
    //                 'status' => 'success',
    //                 'message' => 'Data Berhasil disimpan'
    //             ], 200);
    //     }
    // }
    public function submitskm()
    {
        // Menerima data dari formulir
        $requestData = $this->request->getVar();

        // Menyiapkan data untuk disimpan ke database
        $dataToInsert = [
            'nik' => $requestData['nik'],
            'nama' => $requestData['nama'],
            'jk' => $requestData['jk'],
            'no_hp' => $requestData['no_hp'],
            'pendidikan' => $requestData['pendidikan'],
            'pekerjaan' => $requestData['pekerjaan'],
            'jenis_layanan' => $requestData['jenis_layanan'],
            'tempat_layanan' => $requestData['tempat_layanan'],
            'saran' => $requestData['saran'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Mengambil jawaban dari setiap pertanyaan yang di-looping
        foreach ($requestData['answers'] as $questionId => $answerValue) {
            // Menambahkan jawaban ke data yang akan disimpan ke database
            $dataToInsert['id_question'] = $questionId;
            $dataToInsert['option1'] = ($answerValue == 'option1') ? 1 : 0;
            $dataToInsert['option2'] = ($answerValue == 'option2') ? 1 : 0;
            $dataToInsert['option3'] = ($answerValue == 'option3') ? 1 : 0;
            $dataToInsert['option4'] = ($answerValue == 'option4') ? 1 : 0;

            // Menyimpan data ke database
            $this->survey->insert($dataToInsert);
        }

        // Memberikan respons berhasil kepada pengguna
        return $this->respond([
            'status' => 'success',
            'message' => 'Data Berhasil disimpan'
        ], 200);
    }
}
