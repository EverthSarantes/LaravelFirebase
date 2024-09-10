<?php

namespace App\Models\Firebase;

use Firebase\Models\FirebaseModel;

class Products extends FirebaseModel
{
    protected $collection = 'productos';
}