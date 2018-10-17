<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\category\CatModel;
use Session;
Session::start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory = CatModel::get();
        return view('category.categoryList')->with('categories',$allCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.addCategory');
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

                'catNames' => 'required|string|max:30',
                'description' =>'required'
        ]);

        /*$catInput = [
            'category_name' =>$request->catNames,
            'category_description'=>$request->description,
            'category_status' => $request->status
        ];*/

        $data = new CatModel();

        $data->category_name = $request->catNames;
        $data->category_description = $request->description;
        
        $data->save();


        /*CatModel::create($catInput);*/
        return redirect(route('category.index'));
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
        $category = CatModel::where('id',$id)->get();
        return view('category.categoryEdit')->with('category',$category);
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

            'catNames' => 'required|string|max:30',
            'description' =>'required'
        ]);


        $catInput = [
            'category_name' =>$request->catNames,
            'category_description'=>$request->description
        ];

        CatModel::where('id',$id)->update($catInput);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CatModel::where('id',$id)->delete();
        Session::put('message','category deleted');
        return redirect(route('category.index'));
    }


    public function activeCategory($catId)
    {
        CatModel::where('id',$catId)->update(['category_status'=>0]);
        Session::put('message','category status is changed');
        return redirect(route('category.index'));
    }

    public function deactiveCategory($catId)
    {
        CatModel::where('id',$catId)->update(['category_status'=>1]);
        Session::put('message','category status is changed');
        return redirect(route('category.index'));
    }


  
}
