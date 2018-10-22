<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\product\ProductModel;
use App\model\category\CatModel;
use App\model\manufacturer\ManufacturerModel;
use Session;
Session::start();

class ProductController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = ProductModel::get();
       return view('product.productList')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CatModel::get();
        $manufacturer = ManufacturerModel::get();
         return view('product.addProduct')->with(['categories' => $categories, 'manufactureres' => $manufacturer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'productName' => 'required|string|max:30',
            'category_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'product_sd' => 'required',
            'product_ld' => 'required|min:30',
            'productImage' => 'required|mimes:jpeg,jpg,png,gif',
            'productPrice' => 'required',
            'productColor' => 'required|string',
            'productSize' => 'required|'
        ]);

        $image = $request->file('productImage');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_update_name = $imageName.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_update_name;
            $succesImage = $image->move($upload_path,$image_update_name);
            if($succesImage){
                $input = [

                    'product_name' => $request->productName,
                    'category_id' => $request->category_id,
                    'manufacturer_id' => $request->manufacturer_id,
                    'product_sort_desc' => $request->product_sd,
                    'product_long_desc' => $request->product_ld,
                    'product_price' => $request->productPrice,
                    'product_size' => $request->productSize,
                    'product_color' => $request->productSize,
                    'product_status' =>$request->product_status,
                    'product_image' =>$image_url
                ];

                ProductModel::insert($input);
                return redirect(route('product.index'));
            }
        }

            $input = [

                    'product_name' => $request->productName,
                    'category_id' => $request->category_id,
                    'manufacturer_id' => $request->manufacturer_id,
                    'product_sort_desc' => $request->product_sd,
                    'product_long_desc' => $request->product_ld,
                    'product_price' => $request->productPrice,
                    'product_size' => $request->productSize,
                    'product_color' => $request->productSize,
                    'product_status' =>$request->product_status
                ];

                ProductModel::insert($input);
                return required(route('product.index'));
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editProduct = ProductModel::where('id',$id)->get();
        $categories = CatModel::get();
        $manufactureres = ManufacturerModel::get();
        return view('product.productEdit')->with(['editProduct'=> $editProduct,'categories' => $categories, 'manufactureres' => $manufactureres]);
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
        $request->validate([

            'productName' => 'required|string|max:30',
            'category_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'product_sd' => 'required',
            'product_ld' => 'required|min:30',
            'productImage' => 'mimes:jpeg,jpg,png,gif',
            'productPrice' => 'required',
            'productColor' => 'required|string',
            'productSize' => 'required|'
        ]);



        $image = $request->file('productImage');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_update_name = $imageName.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_update_name;
            $succesImage = $image->move($upload_path,$image_update_name);
            if($succesImage){
                $input = [

                    'product_name' => $request->productName,
                    'category_id' => $request->category_id,
                    'manufacturer_id' => $request->manufacturer_id,
                    'product_sort_desc' => $request->product_sd,
                    'product_long_desc' => $request->product_ld,
                    'product_price' => $request->productPrice,
                    'product_size' => $request->productSize,
                    'product_color' => $request->productSize,
                    'product_status' =>$request->product_status,
                    'product_image' =>$image_url
                ];
               
                ProductModel::where('product_id',$id)->update($input);
                return redirect(route('product.index'));
            }
         }

            $input = [

                    'product_name' => $request->productName,
                    'category_id' => $request->category_id,
                    'manufacturer_id' => $request->manufacturer_id,
                    'product_sort_desc' => $request->product_sd,
                    'product_long_desc' => $request->product_ld,
                    'product_price' => $request->productPrice,
                    'product_size' => $request->productSize,
                    'product_color' => $request->productSize,
                    'product_status' =>$request->product_status
                ];
               
                ProductModel::where('id',$id)->update($input);
                return redirect(route('product.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductModel::where('id',$id)->delete();
        Session::put('message','Product deleted');
        return redirect(route('product.index'));
    }


    public function activeProduct($id)
    {
        
        ProductModel::where('id',$id)->update(['product_status'=>0]);
        Session::put('message','Product acitvaded ');
        return redirect(route('product.index'));
    }


    public function deactiveProduct($id)
    {
        
        ProductModel::where('id',$id)->update(['product_status'=>1]);
        Session::put('message','Product deacitvaded ');
        return redirect(route('product.index'));
    }
}
