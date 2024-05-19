<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = "tb_survey";
    protected $primaryKey = "id";
    protected $allowedFields = ['nik', 'nama', 'jk', 'umur', 'no_hp', 'pendidikan', 'pekerjaan', 'jenis_layanan', 'tempat_layanan', 'saran', 'id_question', 'option1', 'option2', 'option3', 'option4', 'created_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    public function groupDistinct()
    {
        // Membuat array kosong untuk menyimpan data unik
        $uniqueData = [];

        // Mengambil semua data dari tabel
        $allData = $this->findAll();

        // Iterasi melalui data
        foreach ($allData as $row) {
            // Kunci gabungan untuk setiap baris
            $key = $row['nik'] . $row['created_at'];

            // Jika kunci belum ada dalam array unik, tambahkan baris ke array
            if (!array_key_exists($key, $uniqueData)) {
                $uniqueData[$key] = $row;
            }
        }

        // Mengembalikan array data unik
        return $uniqueData;
    }
    // Model SurveyModel
    public function getSurveyData($nik, $createdAt)
    {
        return $this->where('nik', $nik)
            ->where('created_at', $createdAt)
            ->findAll();
    }

    public function countOption1()
    {
        return $this->selectSum('option1')->findAll();
    }
    public function countOption2()
    {
        return $this->selectSum('option2')->findAll();
    }
    public function countOption3()
    {
        return $this->selectSum('option3')->findAll();
    }
    public function countOption4()
    {
        return $this->selectSum('option4')->findAll();
    }
    public function countDistinctJK()
    {
        $sql = "SELECT COUNT(*) as count_JK 
            FROM (SELECT DISTINCT nik, created_at 
                  FROM tb_survey 
                  WHERE JK = 1) AS subquery";

        $query = $this->db->query($sql);
        $row = $query->getRow();

        return $row->count_JK;
    }
    public function countDistinctPR()
    {
        $sql = "SELECT COUNT(*) as count_PR 
            FROM (SELECT DISTINCT nik, created_at 
                  FROM tb_survey 
                  WHERE JK = 2) AS subquery";

        $query = $this->db->query($sql);
        $row = $query->getRow();

        return $row->count_PR;
    }
    public function countByEducation($education)
    {
        return $this->select('COUNT(*) as count')
            ->where('pendidikan', $education)
            ->groupBy('nik, created_at')
            ->countAllResults();
    }

    public function countAllByEducation()
    {
        $educations = ['SD', 'SMP', 'SMA', 'Diploma III', 'Diploma IV / Sarjana', 'Magister', 'Doktor'];
        $result = [];

        foreach ($educations as $education) {
            $result[$education] = $this->countByEducation($education);
        }

        return $result;
    }
    public function countByGender()
    {
        $query = $this->db->query("
            SELECT JK, COUNT(*) as count 
            FROM (
                SELECT DISTINCT nik, created_at, JK 
                FROM tb_survey
            ) as distinct_survey
            GROUP BY JK
        ");

        return $query->getResultArray();
    }
    public function countByJob()
    {
        $query = $this->db->query("
            SELECT pekerjaan, COUNT(*) as count 
            FROM (
                SELECT DISTINCT nik, created_at, pekerjaan 
                FROM tb_survey
            ) as distinct_survey
            GROUP BY pekerjaan
        ");

        return $query->getResultArray();
    }

    public function countEducation()
    {
        $query = $this->db->query("
            SELECT pendidikan, COUNT(*) as count 
            FROM (
                SELECT DISTINCT nik, created_at, pendidikan 
                FROM tb_survey
            ) as distinct_survey
            GROUP BY pendidikan
        ");

        return $query->getResultArray();
    }

    public function countSatisfaction()
    {
        $query = $this->db->query("
        SELECT 
            SUM(option4) as sangat_puas, 
            SUM(option3) as puas, 
            SUM(option2) as kurang_puas, 
            SUM(option1) as tidak_puas
        FROM tb_survey
    ");

        return $query->getRowArray();
    }
}
