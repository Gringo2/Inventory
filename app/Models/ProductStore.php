<?php

namespace App\Models;
use BinaryCats\Sku\HasSku;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;

    use HasSku;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function transaction_line(){
        return $this->hasmany(TransactionLine::class);
    }

}
