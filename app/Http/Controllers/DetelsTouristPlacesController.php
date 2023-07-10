<?php

namespace App\Http\Controllers;

use App\Models\detelsTouristPlaces;
use Illuminate\Http\Request;
use App\Models\touristPlaces;
class DetelsTouristPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $TouristPlaces = touristPlaces::all();
        $detelsTouristPlaces = detelsTouristPlaces::all();
        return view('TouristPlaces.detelsTouristPlaces',compact('detelsTouristPlaces','TouristPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function create()
    {
        
    }
    public function detelsTouristPlaces($hotelId)
    {
        $TouristPlaces = detelsTouristPlaces::where('tourist_id', $hotelId)->get();
        return response()->json( $TouristPlaces );
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
       
        $TouristPlaces = new detelsTouristPlaces;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs('public/images', $imageName);
        $TouristPlaces->explain = $request->explain;
        $TouristPlaces->informationtrip = $request->informationtrip;
        $TouristPlaces->location = $request->location;
        $TouristPlaces->tourist_id = $request->contentourist;
        $TouristPlaces->contentourist = $request->contentourist;
        $TouristPlaces->image = $imageName;
        $TouristPlaces->save();
        }
       session()->flash('Add', 'تم اضافة المكان السياحي بنجاح ');
        return redirect('/detelsTouristPlaces');
 
        $input = $request->all();
$b_exit = detelsTouristPlaces::where('explain','=',$input['explain'])->all();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detelsTouristPlaces  $detelsTouristPlaces
     * @return \Illuminate\Http\Response
     */
    public function show(detelsTouristPlaces $detelsTouristPlaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detelsTouristPlaces  $detelsTouristPlaces
     * @return \Illuminate\Http\Response
     */
    public function edit(detelsTouristPlaces $detelsTouristPlaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detelsTouristPlaces  $detelsTouristPlaces
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
     * @param  \App\Models\detelsTouristPlaces  $detelsTouristPlaces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        detelsTouristPlaces::find($id)->delete();
        session()->flash('delete','تم حذف المكان السياحي بنجاح');
        return redirect('/detelsTouristPlaces');
      
    }
}
