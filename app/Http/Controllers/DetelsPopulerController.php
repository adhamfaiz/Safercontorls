<?php

namespace App\Http\Controllers;

use App\Models\Popular;
use App\Models\Detels_populer;
use Illuminate\Http\Request;

class DetelsPopulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Popular = Popular::all();
        $detels_populer = detels_populer::all();
        return view('TouristPlaces.detelsPopular',compact('detels_populer','Popular'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function populer($hotelId)
    {
        $populer = detels_populer::where('populars_id', $hotelId)->get();
        return response()->json( $populer );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'explain' => 'required|unique:detels_populers',
            'informationtrip' =>'required',
            'location' =>'required',
            
           
        ],[

            'explain.required' =>'يرجي ادخال شرح المكان السياحي',
            'explain.unique' =>' شرح الرحله السياحي مسجل مسبقا',
            'informationtrip.required' =>'يرجي ادخال معلومات الرحله',
            'location.required' =>'يرجي ادخال الموقع',

        ]);
   
        $TouristPlaces = new detels_populer;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $path = $image->storeAs('public/images', $imageName);
        $TouristPlaces->explain = $request->explain;
        $TouristPlaces->informationtrip = $request->informationtrip;
        $TouristPlaces->location = $request->location;
        $TouristPlaces->contentourist = $request->contentourist;
        $TouristPlaces->populars_id = $request->contentourist;
        $TouristPlaces->image = $imageName;
        $TouristPlaces->save();
        }
       session()->flash('Add', 'تم اضافة المكان السياحي بنجاح ');
        return redirect('/detels_populer');
 
        $input = $request->all();
$b_exit = detels_populer::where('explain','=',$input['explain'])->all();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detels_populer  $detels_populer
     * @return \Illuminate\Http\Response
     */
    public function show(Detels_populer $detels_populer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detels_populer  $detels_populer
     * @return \Illuminate\Http\Response
     */
    public function edit(Detels_populer $detels_populer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detels_populer  $detels_populer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'explain' => 'required|unique:detels_tourist_places,explain,'.$id,
            'informationtrip' => 'required',
            'location' => 'required',
           
        ],
        [

            'explain.required' =>'يرجي ادخال شرح المكان السياحي',
            'explain.unique' =>' شرح الرحله السياحي مسجل مسبقا',
            'informationtrip.required' =>'يرجي ادخال معلومات الرحله',
            'location.required' =>'يرجي ادخال الموقع',
            

        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/hotels'), $imageName);
        $detelsTourist = detelsTouristPlaces::find($id);
        $detelsTourist->explain = $request->explain;
        $detelsTourist->informationtrip = $request->informationtrip;
        $detelsTourist->location = $request->location;
        $detelsTourist->contentourist = $request->contentourist;
        $TouristPlaces->image = $imageName;
        $detelsTourist->save();
        session()->flash('edit','تم تعديل المكان السياحي بنجاح');
        return redirect('/detelsTouristPlaces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detels_populer  $detels_populer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        detels_populer::find($id)->delete();
        session()->flash('delete','تم حذف المكان السياحي بنجاح');
        return redirect('/detels_populer');
    }
}
