<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
  
    public $product;
    public $quantity;

    // Constructor
    public function __construct ( Product $product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
  
 
}

