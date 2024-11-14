<?php

namespace App\Controllers\Admin2045;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Config;
use App\Models\RatingModel;

class Dashboard extends BaseController
{
    use ResponseTrait;
    var $model, $tindak, $admin, $tanya;
    function __construct()
    {
        $this->model = new RatingModel();
    }
    public function index()
    {
        $data['ratingCounts'] = $this->getRatingCounts();

        echo view("admin/dashboard", $data);
    }

    private function getRatingCounts()
    {
        $ratingCounts = [];

        for ($i = 1; $i <= 5; $i++) {
            $ratingCounts[$i] = $this->model->where('rating', $i)->countAllResults();
        }

        return $ratingCounts;
    }
}
