<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';        // Nama tabel
    protected $primaryKey = 'id';        // Primary key tabel
    protected $allowedFields = ['rating'];  // Field yang boleh diisi
}
