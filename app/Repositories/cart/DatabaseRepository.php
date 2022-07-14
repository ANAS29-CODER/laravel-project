<?php

namespace App\Repositories\Cart;

use App\Models\Cart;

use  App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\View\Components\product_item;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

class DatabaseRepository implements CartRepository
{

    protected $items;

    public function __construct()
    {
        $this->items=collect([]);

    }



    public function all()
    {
        if($this->items->count()==0){
            $this->items= Cart::where('cookie_id', $this->getCookieId())
                ->orWhere('user_id', Auth::id())
                ->get();

        }

        return $this->items;


    }

    public function add($item, $gty = 1)
    {



         $cart=Cart::updateOrCreate([

            'cookie_id' => $this->getCookieId(),
            'product_id' => ($item instanceof Product) ? $item->id : $item,

        ], [

           // 'user_id' => Auth::id(),
            'quantity' => DB::raw('quantity + ' . $gty),

        ]);
        $this->items=collect([]);
        return $cart;

    }

    public function clear()
    {

        return Cart::where('cookie_id', $this->getCookieId())
            ->orWhere('user_id', Auth::id())
            ->delete();
    }



    public function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');
        if (!$id) {

            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 30 * 24);
        }

        return $id;
    }


    public function total(){

        $items= $this->all();
        //get the total by the sum function
        return  $items->sum(function ($item){
            return $item->quantity * $item->product->price;

        });

        //get the total by forloop

        /*
         $total=0;



        foreach($items as $item){
            $total+= $item->quantity * $item->product->price;

        }
        return $total;


        */
    }



    public function quantity()
    {
        $items=$this->all();
        return  $items->sum('quantity');
    }


}
