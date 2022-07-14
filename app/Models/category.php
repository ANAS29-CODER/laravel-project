<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\product;

use Illuminate\Database\Eloquent\softDeletes;

class category extends Model
{
    use HasFactory;

     use softDeletes;


    protected $fillable=['name','slug','parent_id' , 'description','status','img',];

    public function products(){
        return $this->hasMany(
            Product::class,
            'category_id',
            'id'
        );
    }

      public function children(){
        return $this->hasMany(
            Category::class,
            'parent_id',
            'id'
        );//غالبا استخدامها مع الي تحت  ->withDefault();
    }

      public function parent(){
        return $this->belongsTo(
             Category::class,
            'parent_id',
            'id'
        )->withDefault([
            'name'=>'Not Found',
        ])->withDefault();
    }
}