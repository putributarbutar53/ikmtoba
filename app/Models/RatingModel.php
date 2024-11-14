<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['rating'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
