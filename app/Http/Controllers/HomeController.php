<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\product\ProductModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::orderBy('id','asc')->limit(6)->get();

        return view('home')->with('products',$products);
    }

    public function showProductByCategoryId($id)
    {
        $products_by_category = ProductModel::where('category_id',$id)->where('product_status',1)->get();
        return view('productByCategoryId')->with('products_by_category',$products_by_category);
    }

    public function showProductByManufacturerId($id)
    {
        $products_by_manufacturers = ProductModel::where('manufacturer_id',$id)->where('product_status',1)->get();
        return view('productByManufacturerId')->with('products_by_manufacturers',$products_by_manufacturers);
    }

    public function showProductDetailsById($id)
    {
        $product_details = ProductModel::where('id',$id)->get();
        return view('productDetails')->with('product_details',$product_details);
    }
}
