<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'identification',
        'name',
        'comment'
    ];

    public function getAllStaff(){
        return $this->all();
    }

    public function staffPaginate(){
        return $this->orderBy('id','DESC')->paginate(5);
    }

}
