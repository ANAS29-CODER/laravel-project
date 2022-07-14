<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\category;
use Illuminate\Support\Str;
use  App\Models\product;
//use Illuminate\Validation\Validator;
use Validator;


class CategoriesController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $se=session()->get('success');


        $entity=  category::all();

        return view('admin.categories.index',[

            'categories'=>$entity,
            'title'=>'Categories list',
            'success'=>$se,


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents= category::all();
        return view('admin.categories.create',compact('parents'));
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
                'name'=> 'required|string|max:255|min:3' ,
            'parent_id'=>'nullable|integer|exists:categories,id',
            'description'=>'nullable|min:10' ,
            'status'=>'in:active,draft|nullable',
           //  'image'=>'image|max:1024|dimensions:mi000000000000n_width=300,min_height=300',
        ]);*/
  $rules=[

            'name'=> 'required|string|max:255|min:3' ,
            'parent_id'=>'nullable|integer|exists:categories,id',
            'description'=>'nullable|min:10' ,
            'status'=>'in:active,draft|nullable',
           //  'image'=>'image|max:1024|dimensions:min_width=300,min_height=300',
        ];
      $request->validate($rules,[

            'name.required'=> 'this Category name  is requierd',
        ]);
/*
        $data=$request->all();
        $validator=  Validator::make($data,$rules);
    //    $clean= $validator->validate();
        if($validator->fails()){
            return   redirect()->back()->withErrors($validator)->withInput();
        }*/






        $request->merge([
            'slug'=>Str::slug($request->post('name'))

        ]);



             $category=new Category($request->all());//mass assaiment
             $category->save();
            return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

       $categorys= Category::with('products')->withCount('products as count')->get();
       $products= $category->products;
       $pro=$category->withCount('products');
        return view('admin.categories.index',[
            'categories'=>$categorys,

            'title'=>'sasa',
            'success'=>'asda'

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        $parents= Category::where('id', '<>', $category->id)->get();
         return view('admin.categories.edit',compact('category' , 'parents'));
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
        $category= Category::find($id);

        $request->merge([
             'slug'=>Str::slug($request->post('name'))
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //$category=new category();
       Category::destroy($id);
      //$category= Category::find($id)->delete();

      /*session([
        'success'=>'cet deleted',
      ]);*/

      session()->flash('success','cat removed');
       return redirect()->route('categories.index');
    }
}
