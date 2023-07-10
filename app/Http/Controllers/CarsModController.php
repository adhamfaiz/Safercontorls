<?php

namespace App\Http\Controllers;

use App\Models\Cars_mod;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cars_mod = Cars_mod::all();
        $cars = car::all();
        return view('Car.Cars',compact('Cars_mod','cars')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = car::all();
        $addcar = Cars_mod::all();

        return view( 'Car.addcar', compact( 'addcar', 'car' ) );
    }
    public function carmode($hotelId)
    {
        $carmode = Cars_mod::where('cars_id', $hotelId)->get();
        return response()->json( $carmode );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $hotel = new Cars_mod;
        if ($request->hasFile('image')) {
            $image = $request->file( 'image' );
            $image = $request->file( 'imgroomtow' );
            $image = $request->file( 'imgroomthree' );
            $image = $request->file( 'imgroomfour' );
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs( 'public/images', $imageName );
            $hotel->name_car = $request->name_car;
            $hotel->Car_Model = $request->Car_Model;
            $hotel->MAnfacturing_year = $request->MAnfacturing_year;
            $hotel->num_doors = $request->num_doors;
            $hotel->cars_id = $request->contentcomp;
            $hotel->contentcomp = $request->contentcomp;
            $hotel->luggage = $request->luggage;
            $hotel->years = $request->years;
            $hotel->price_day = $request->price_day;
            $hotel->Motion_vector = $request->Motion_vector;
            $hotel->drap = $request->drap;
            $hotel->catgory = $request->catgory;
            $hotel->image = $imageName;
            $hotel->imgroomtow = $imageName;
            $hotel->imgroomthree = $imageName;
            $hotel->imgroomfour = $imageName;
            $hotel->save();
         }
       
       session()->flash('Add', 'تم اضافة السياره  بنجاح ');
        return redirect('/Cars_mod');
 
 
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars_mod  $cars_mod
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cars_mod  $cars_mod
     * @return \Illuminate\Http\Response
     */
    public function edit(Cars_mod $cars_mod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars_mod  $cars_mod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        
        $this->validate($request, [
            'name_car' => 'required|max:255|unique:_cars_mod,name_car,'.$id,
            'name_car.required' =>'يرجي ادخال اسم السياره',
            'name_car.unique' =>'اسم السياره مسجل مسبقا',
            'price.required' =>'يرجي ادخال السعر',
            'years.required' =>'يرجي ادخال الموديل ',
            'drap.required' =>'يرجي ادخال  عدد المقاعد ',
            'catgory.cars_id' =>'يرجي ادخال  تابع الشركه ',
            'catgory.contentcomp' =>'يرجي ادخال  تابع الشركه ',
            'catgory.required' =>'يرجي ادخال  تقييم ',
            'image.required' =>'يرجي ادخال صور الشركه ',

        ]);
       
          $hotel = Cars_mod::find($id);
            $hotel->name_car = $request->name_car;
            $hotel->price = $request->price;
            $hotel->years = $request->years;
            $hotel->drap = $request->drap;
            $hotel->cars_id = $request->contentcomp;
            $hotel->catgory = $request->catgory;
            $hotel->contentcomp = $request->contentcomp;
            $hotel->image = $request->image;
            $hotel->update();

        session()->flash('edit','تم تعديل السياره بنجاح');
        return redirect('/Cars_mod');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars_mod  $cars_mod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Cars_mod::find($id)->delete();
        session()->flash('delete','تم حذف السياره بنجاح');
        return redirect('/Cars_mod');
    }
}
