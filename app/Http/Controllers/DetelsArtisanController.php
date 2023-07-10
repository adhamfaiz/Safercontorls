<?php

namespace App\Http\Controllers;

use App\Models\MontionTouristPlaces;
use App\Models\Detels_artisan;
use Illuminate\Http\Request;

class DetelsArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detels_artisan = detels_artisan::all();
        $detelsmontions = montionTouristPlaces::all();
        return view('TouristPlaces.detelsMontion',compact('detels_artisan','detelsmontions'));
    }
    public function artisan($hotelId)
    {
        $artisan = detels_artisan::where('Montion_id', $hotelId)->get();
        return response()->json( $artisan );
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'informationtrip' =>'required',
            'location' =>'required',
            
           
        ],[

            'explain.required' =>'يرجي ادخال شرح المكان السياحي',
            'explain.unique' =>' شرح الرحله السياحي مسجل مسبقا',
            'informationtrip.required' =>'يرجي ادخال معلومات الرحله',
            'location.required' =>'يرجي ادخال الموقع',

        ]);

        $TouristPlaces = new detels_artisan;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs('public/images', $imageName);
        $TouristPlaces->explain = $request->explain;
        $TouristPlaces->informationtrip = $request->informationtrip;
        $TouristPlaces->location = $request->location;
        $TouristPlaces->contentourist = $request->contentourist;
        $TouristPlaces->Montion_id = $request->contentourist;
        $TouristPlaces->image = $imageName;
        $TouristPlaces->save();
        }
       session()->flash('Add', 'تم اضافة المكان السياحي بنجاح ');
        return redirect('/detels_artisan');
 
        $input = $request->all();
$b_exit = detelsTouristPlaces::where('explain','=',$input['explain'])->all();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detels_artisan  $detels_artisan
     * @return \Illuminate\Http\Response
     */
    public function show(Detels_artisan $detels_artisan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detels_artisan  $detels_artisan
     * @return \Illuminate\Http\Response
     */
    public function edit(Detels_artisan $detels_artisan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detels_artisan  $detels_artisan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detels_artisan $detels_artisan)
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
     * @param  \App\Models\Detels_artisan  $detels_artisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detels_artisan $detels_artisan)
    {
        $id = $request->id;
        detelsTouristPlaces::find($id)->delete();
        session()->flash('delete','تم حذف المكان السياحي بنجاح');
        return redirect('/detelsTouristPlaces');
    }
}
