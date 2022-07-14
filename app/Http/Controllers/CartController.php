<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\Cart\CartRepository;


class CartController extends Controller
{

/**
 * @var \App\Repositories\Cart\CartRepository
 */
    protected $cart;

    public function __construct(CartRepository $cart)
    {

        $this->cart = $cart;
    }



    public function index()
    {

        $cart = Cart::all();

     //  $this->cart->add(Product::find($id),2);



        // $this->cart->add(Product::find(70));


      return view('fronts.cart', [
            'carts' => $cart,
            'total'=> $this->cart->total(),
        ]);
    }


    public function store(Request $request)
    {

        if($request->post('quantity') > 5){
            Session::flash('success', 'Quantity must be les than 6');
            return  redirect()->back();
        }

        $request->validate([

            'product_id' => 'required|exists:products,id',
            'quantity' => [
                'integer', 'min:1', function($attr,$value,$fail){
                    $id=request()->input('product_id');
                    $product=Product::find($id);
                    if( $value < $product->quantity){
                        $fail('sadsfa');
                    }
                }
            ],

        ]);

        $pro_id= $request->post('product_id');
        $qua= $request->post('quantity');

        $cart= $this->cart->add($pro_id, $qua);

        if($request->expectsJson()){

           return $this->cart->all();//get data from direct DB

        }



        Session::flash('success', 'finally suuccessfully');
        return redirect()->back();


    }


}