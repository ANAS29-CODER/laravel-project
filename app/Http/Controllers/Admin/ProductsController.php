<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\product;
use  App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\softDeletes;

//use Illuminate\Validation\Validator;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pro= Product::onlyTrashed()->paginate();

        return view('admin.products.index',[
           'title'=>'pro page',
           'products'=>$pro,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $cat= Category::all();
        return view('admin.product.create',[
            'category'=>$cat,
            'product'=> new Product(),

        ]

        );
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



             $products=new Product($request->all());//mass assaiment
             $products->save();
            return redirect()->route('products.index')->with('success' , 'Product ($products->name) is created');
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
          return view('admin.product.show',[

            'product'=> $product,

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
            $product= Product::findOrFail($id);
          return view('admin.product.edit',[

            'product'=> $product,
            'category'=> Category::all(),

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

        $request->validate(Product::vlaidateRule());
        $product->update($request->all());

        return redirect()->route('products.index')->with('success' , 'Product ($products->name) is updated');

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
        return redirect()->route('products.index')
        ->with('success' , 'Product ($products->name) is deleted');
    }
}
