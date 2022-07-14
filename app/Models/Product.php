<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\category;

use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory;

    use softDeletes;

    protected $fillable=['name','description','sku','quantity','price','sale_price','width',
    'height','length','weight','status','img_path','slug', 'category_id'];



    public static function validateRule()
    {

        return[
       'name' => 'required|max:255',
        'category_id' => 'required|integer|exists:categories,id',
        'description' => 'nullable',
        'sku'=>'nullable|unique:products,sku',
        'quantity'=>'nullable|integer|min:0',
        'price'=>'nullable|numeric|min:0',
        'sale_price'=>'nullable|numeric|min:0',
        'width'=>'nullable|numeric|min:0',
        'height'=>'nullable|numeric|min:0',
        'length'=>'nullable|numeric|min:0',
        'weight'=>'nullable|numeric|min:0',
        'status'=>'in:active,draft',
        'img_path' => 'nullable|image|dimensions:min_width=300,min_height=300',

        ];
    }


    protected  $appends = [
        'image_url',
        'route_link',

    ];


    public function getImageUrlAttribute()
    {
            if(!$this->img_path){
                return asset('assets/sea.jpg');
            }
             if(stripos($this->img_path,'http')===0 ){
                return $this->img_path;
            }

            return asset('storage/' . $this->img_path);

    }

    public function getRouteLinkAttribute(){

        return  route('product.details', $this->slug);

    }

/*
    public function getOriginalNameAttribute($value)
    {

          //  return $this->attributes['name'];

    }
*/


    public function category(){
            return $this->belongsTo(
                Category::class,
                'category_id',
                'id'
            );
        }

           public function user(){
            return $this->belongsTo([
                user::class,
                'user_id',
                'id'
            ])->withDefault;
        }

//مراااااجعة
           public function ratings(){
            return $this->morphMany(Rating::class, [


            'rateable_id',
            'rateable_type',
            'rateable',
            'id' ])->withDefault;
        }





}
