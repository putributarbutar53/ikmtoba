<?php

namespace App\Controllers;

use App\Models\RatingModel;
use CodeIgniter\HTTP\ResponseInterface;

class RatingController extends BaseController
{
    public function save()
    {
        $rating = $this->request->getPost('rating');

        $ratingModel = new RatingModel();
        $data = [
            'rating_value' => $rating
        ];

        if ($ratingModel->save($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error'], ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
