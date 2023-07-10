<?php

namespace App\Http\Controllers;

use App\Models\Popular;
use Illuminate\Http\Request;

class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Popular = Popular::all();
        return view('TouristPlaces.Popular',compact('Popular'));
    }
    public function populr()
    {
       return Popular::all();
       
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
            'name_TouristPlaces' => 'required|unique:populars|max:255',
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

         $TouristPlaces = new Popular;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $path = $image->storeAs('public/images', $imageName);
        $TouristPlaces->name_TouristPlaces = $request->name_TouristPlaces;
        $TouristPlaces->address = $request->address;
        $TouristPlaces->types = $request->types;
        $TouristPlaces->description = $request->description;
        $TouristPlaces->image = $imageName;
        $TouristPlaces->save();
        }
       session()->flash('Add', 'تم اضافة المكان السياحي بنجاح ');
        return redirect('/Popular');
 
        $input = $request->all();
$b_exit = Popular::where('name_TouristPlaces','=',$input['name_TouristPlaces'])->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function show(Popular $popular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function edit(Popular $popular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->id;

        $this->validate($request, [

            'name_TouristPlaces' => 'required|max:255|unique:populars,name_TouristPlaces,'.$id,
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

        $car = Popular::find($id);
        $car->update([
            'name_TouristPlaces' => $request->name_TouristPlaces,
            'description' => $request->description,
            'address' => $request->address,
            'types' => $request->types,
            'description' => $request->description,
            'image' =>$request->image,
        ]);

        session()->flash('edit','تم تعديل المكان السياحي بنجاح');
        return redirect('/Popular');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Popular::find($id)->delete();
        session()->flash('delete','تم حذف المكان السياحي بنجاح');
        return redirect('/Popular');
    }
}
