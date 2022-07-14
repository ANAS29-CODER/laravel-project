<?php
namespace App\Repositories\Cart;
use  App\Repositories\Cart\CartRepository;

use  Illuminate\Support\Facades\Cookie;

 class CookieRepository implements CartRepository
{




    protected $name='cart';

    public function all()
    {

        return Cookie::get($this->name);
    }

     public function add($item, $gty = 1)
    {
        $items=$this->all();
        $items[]=$item;

        Cookie::queue($this->name,$items,60*30*60);
    }
     public function clear()
    {

       Cookie::queue($this->name,'',-6000);
    }

}
