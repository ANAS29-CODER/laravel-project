<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\product;
use  App\Models\category;
use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Gate;
//use Illuminate\Validation\Validator;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {


             $success=session()->get('success');
        $pro= Product::join('categories', 'categories.id' , '=' , 'products.category_id')
        ->select([
            'products.*',
            'categories.name as category_name'
        ])
        ->paginate(10);

        return view('admin.products.index',[
            'success'=>$success,
            'products'=> $pro,
            'title'=>'Product',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*  Gate::authorize('products.create');
        $parents= Category::all();

        return view('admin.products.create',[
            'parents'=>$parents,
             'title'=>' Product',

        ]

        );*/
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   /*  $request->validate([

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

      'image' => 'nullable|image|dimensions:min_width=300,min_height=300',

     ]);*/

     $request->validate(Product::validateRule());


        $request->merge([
            'slug'=>Str::slug($request->post('name'))

        ]);


        if($request->hasFile('image')){


            $file=$request->file('image');

            $img_path=$file->store('uploads','public');

            $request->merge([

                'img_path'=>$img_path,
            ]);

        }

             $products=new Product($request->all());//mass assaiment
             $products->save();
            return redirect()->route('products.index')->with('success' , "Product ($products->name) is created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::findOrFail($id);
          return view('admin.products.show',[

            'product'=> $product,
            'title'=>'ssa',
          
        ]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $product=  Product::findOrFail($id);

          return
          view('admin.products.edit',[

            'product'=> $product,
            'category'=> Category::all(),
             'title'=>'ssa',

          ]
          );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $product= Product::findOrFail($id);

        $request->merge([
             'slug'=>Str::slug($request->post('name'))
        ]);

        $request->validate(Product::validateRule());




        $product->update($request->all());

        return redirect()->route('products.index')->with('success' , "Product ($product->name) is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
          $product= Product::findOrFail($id);


         $product->delete();
         // Product::destroy($id);
        return redirect()->route('products.index')
        ->with('success' , "Product ($product->name) is deleted");

    }

    public function  trash(){
        $products= Product::onlyTrashed()->paginate();

        return view('admin.products.index',[
            'products'=>$products,
            'title'=>'Trash Products',
        ]);
    }
}