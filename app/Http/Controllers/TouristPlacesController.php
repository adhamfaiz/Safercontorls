<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TouristPlaces;
use Illuminate\Http\Request;

class TouristPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $touristPlaces = touristPlaces::all();
        return view('TouristPlaces.TouristPlaces',compact('touristPlaces'));
        //
    }
    
    public function torest()
    {
       return touristPlaces::all();
       
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
            'name_TouristPlaces' => 'required|unique:tourist_places|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'address' =>'required',
            'types' =>'required',
            'description' =>'required',
           
        ],[

            'name_TouristPlaces.required' =>'يرجي ادخال اسم المكان السياحي',
            'name_TouristPlaces.unique' =>'اسم المكان السياحي مسجل مسبقا',
            'address.required' =>'يرجي ادخال العنوان',
            'description.required' =>'يرجي ادخال وصف المكان السياحي',
            'types.required' =>'يرجي ادخال  نوع المكان السياحي ',
            'image.required' =>'يرجي ادخال صور المكان السياحي ',

        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/hotels'), $imageName);
      
        // إنشاء سجل للفندق في قاعدة البيانات وإضافة اسم الصورة
        $TouristPlaces = new touristPlaces;
        $TouristPlaces->name_TouristPlaces = $request->name_TouristPlaces;
        $TouristPlaces->address = $request->address;
        $TouristPlaces->types = $request->types;
        $TouristPlaces->description = $request->description;
        $TouristPlaces->image = $imageName;
        $TouristPlaces->save();
       session()->flash('Add', 'تم اضافة المكان السياحي بنجاح ');
        return redirect('/TouristPlaces');
 
        $input = $request->all();
$b_exit = touristPlaces::where('name_TouristPlaces','=',$input['name_TouristPlaces'])->all();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TouristPlaces  $touristPlaces
     * @return \Illuminate\Http\Response
     */
    public function show(TouristPlaces $touristPlaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TouristPlaces  $touristPlaces
     * @return \Illuminate\Http\Response
     */
    public function edit(TouristPlaces $touristPlaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TouristPlaces  $touristPlaces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->id;

        $this->validate($request, [

            'name_TouristPlaces' => 'required|max:255|unique:tourist_places,name_TouristPlaces,'.$id,
            'description' => 'required',
            'types' => 'required',
            'address' => 'required',
            'image' => 'required',
           
        ],[
            
            'name_TouristPlaces.required' =>'يرجي ادخال اسم المكان السياحي',
            'name_TouristPlaces.unique' =>'اسم المكان السياحي مسجل مسبقا',
            'address.required' =>'يرجي ادخال العنوان',
            'description.required' =>'يرجي ادخال وصف االمكان السياحي ',
            'types.required' =>'يرجي ادخال  نوع المكان السياحي ',
            'image.required' =>'يرجي ادخال صور المكان السياحي ',
           
        ]);

        $car = touristPlaces::find($id);
        $car->update([
            'name_TouristPlaces' => $request->name_TouristPlaces,
            'description' => $request->description,
            'address' => $request->address,
            'types' => $request->types,
            'description' => $request->description,
            'image' =>$request->image,
        ]);

        session()->flash('edit','تم تعديل المكان السياحي بنجاح');
        return redirect('/TouristPlaces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TouristPlaces  $touristPlaces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        touristPlaces::find($id)->delete();
        session()->flash('delete','تم حذف المكان السياحي بنجاح');
        return redirect('/TouristPlaces');
    }
}
