<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = [
        'supplier',
        'project'
    ];

    public function getAllSupplier(){
        return $this->all();
    }
}
