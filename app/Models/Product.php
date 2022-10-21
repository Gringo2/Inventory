<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function purchase_line(){

        return $this->hasmany(PurhcaseLine::class);

    }

    public function transaction_line(){
        return $this->hasmany(TransactionLine::class);
    }

    public function product_stock(){
        return $this->hasmany(ProductStock::class);
    }
}
