<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id'];

    public function create() {
        Category::create([
            'id' => 1,
            'name' => '美術館',
        ]);
    }
}
