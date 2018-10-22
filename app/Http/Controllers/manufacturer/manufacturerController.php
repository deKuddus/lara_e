<?php

namespace App\Http\Controllers\manufacturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\manufacturer\ManufacturerModel;
use Session;
Session::start();

class manufacturerController extends Controller
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
        $allManufacturer = ManufacturerModel::get();
        return view('manufacturer.manufacturerList')->with('manufacturers',$allManufacturer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer.addManufacturer');
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

            'manufacturerNames' => 'required|string|max:30',
            'manufacturerDescription' =>'required'
         ]);

        $data = new ManufacturerModel();

        $data->manufacturer_name = $request->manufacturerNames;
        $data->manufacturer_description = $request->manufacturerDescription;
        
        $data->save();


        /*CatModel::create($catInput);*/
        return redirect(route('manufacturer.index'));
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
        $manufacturer = ManufacturerModel::where('id',$id)->get();
        return view('manufacturer.manufacturerEdit')->with('manufacturer',$manufacturer);
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

            'manufacturerNames' => 'required|string|max:30',
            'manufacturerDescription' =>'required'
         ]);


        $manufacturerInput = [
            'manufacturer_name' =>$request->manufacturerNames,
            'manufacturer_description'=>$request->manufacturerDescription
        ];

        ManufacturerModel::where('manufacturer_id',$id)->update($manufacturerInput);
        return redirect(route('manufacturer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ManufacturerModel::where('id',$id)->delete();
        Session::put('message','category deleted');
        return redirect(route('manufacturer.index'));
    }

    public function activeManufacturer($id)
    {
        ManufacturerModel::where('id',$id)->update(['manufacturer_status'=>0]);
        Session::put('message','manufacturer status is changed');
        return redirect(route('manufacturer.index'));
    }

    public function deactiveManufacturer($id)
    {
        ManufacturerModel::where('id',$id)->update(['manufacturer_status'=>1]);
        Session::put('message','manufacturer status is changed');
        return redirect(route('manufacturer.index'));
    }
}
