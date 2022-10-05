<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function transaction_line(){
        return $this->hasMany(TransactionLine::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
