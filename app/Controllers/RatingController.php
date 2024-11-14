<?php

namespace App\Controllers;

use App\Models\RatingModel;
use CodeIgniter\HTTP\ResponseInterface;

class RatingController extends BaseController
{
    public function save()
    {
        $rating = $this->request->getPost('rating');  // Mendapatkan input rating dari request

        $ratingModel = new RatingModel();
        $data = [
            'rating' => $rating  // Ubah 'rating_value' menjadi 'rating' agar sesuai dengan model
        ];

        if ($ratingModel->save($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error'], ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
