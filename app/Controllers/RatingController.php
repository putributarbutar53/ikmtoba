<?php

namespace App\Controllers;

use App\Models\RatingModel;
use CodeIgniter\Controller;

class RatingController extends Controller
{
    public function save()
    {
        $rating = $this->request->getPost('rating');

        if ($rating) {
            $ratingModel = new RatingModel();

            $data = [
                'rating' => $rating,
            ];

            if ($ratingModel->insert($data)) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error']);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
    }
}
