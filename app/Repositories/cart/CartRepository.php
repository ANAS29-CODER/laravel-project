<?php


namespace App\Repositories\Cart;


use App\Models\Product;

interface CartRepository
{
public function all();

public function add($item, $gty = 1);

public function clear();

}
