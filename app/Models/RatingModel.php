<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['rating']; // Kolom yang diizinkan untuk diisi
}
