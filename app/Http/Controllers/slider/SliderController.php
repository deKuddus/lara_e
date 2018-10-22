<?php

namespace App\Http\Controllers\slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\slider\SliderModel;
use Session;
Session::start();

class SliderController extends Controller
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
        $slider = SliderModel::get();
        return view('slider.sliderList')->with('sliders',$slider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.addSlider');
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

           
            'sliderImage' => 'required|mimes:jpeg,jpg,png,gif'
        
        ]);

        $image = $request->file('sliderImage');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_update_name = $imageName.'.'.$ext;
            $upload_path = 'slider/';
            $image_url = $upload_path.$image_update_name;
            $succesImage = $image->move($upload_path,$image_update_name);
            if($succesImage){
                $input = [

                    'slider_status' =>$request->sliderStatus,
                    'slider_image' =>$image_url
                ];

                SliderModel::insert($input);
                return redirect(route('slider.index'));
            }
        }

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
        $slider = SliderModel::where('id',$id)->get();
        return view('slider.sliderEdit')->with('slider',$slider);
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

           
            'sliderImage' => 'required|mimes:jpeg,jpg,png,gif'
        
        ]);

        $image = $request->file('sliderImage');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_update_name = $imageName.'.'.$ext;
            $upload_path = 'slider/';
            $image_url = $upload_path.$image_update_name;
            $succesImage = $image->move($upload_path,$image_update_name);
            if($succesImage){
                $input = [

                    'slider_status' =>$request->sliderStatus,
                    'slider_image' =>$image_url
                ];

                SliderModel::where('id',$id)->update($input);
                return redirect(route('slider.index'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       SliderModel::where('id',$id)->delete();
        Session::put('message','slider deleted');
        return redirect(route('slider.index'));
    }

     public function activeSlider($id)
    {
        
        SliderModel::where('id',$id)->update(['slider_status'=>0]);
        Session::put('message','slider acitvated ');
        return redirect(route('slider.index'));
    }


    public function deactiveSlider($id)
    {
        
        SliderModel::where('id',$id)->update(['slider_status'=>1]);
        Session::put('message','slider deacitvated ');
        return redirect(route('slider.index'));
    }
}
