<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $car = car::all();
        
        return view('Car.Car',compact('car'));
    }
    
    public function car()
    {
       return car::all();
       
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
            'name_company' => 'required|unique:cars|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ],[

            'name_company.required' =>'يرجي ادخال اسم الشركه',
            'name_company.unique' =>'اسم الشركه مسجل مسبقا',
            'address.required' =>'يرجي ادخال العنوان',
            'description.required' =>'يرجي ادخال وصف الشركه',
            'phoenumber.required' =>'يرجي ادخال  رقم الهاتف',
            'email.required' =>'يرجي ادخال  تقييم الشركه',
            'image.required' =>'يرجي ادخال صور الشركه ',

        ]);
        $hotel = new car;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs('public/images', $imageName);
            $hotel->name_company = $request->name_company;
            $hotel->address = $request->address;
            $hotel->phoenumber = $request->phoenumber;
            $hotel->description = $request->description;
            $hotel->email = $request->email;
            $hotel->image = $imageName;
            $hotel->save();
         }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/hotels'), $imageName);
       
       session()->flash('Add', 'تم اضافة الشركه بنجاح ');
        return redirect('/Car');
 
        $input = $request->all();
$b_exit = addhotel::where('name_company','=',$input['name_company'])->all();
 
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name_company' => 'required|max:255|unique:cars,name_company,'.$id,
            'description' => 'required',
            'phoenumber' => 'required',
            'email' => 'required',
            'image' => 'required',
           
        ],[
            
            'name_company.required' =>'يرجي ادخال اسم الشركه',
            'name_company.unique' =>'اسم الشركه مسجل مسبقا',
            'address.required' =>'يرجي ادخال العنوان',
            'description.required' =>'يرجي ادخال وصف الشركه',
            'phoenumber.required' =>'يرجي ادخال  رقم الهاتف',
            'email.required' =>'يرجي ادخال  تقييم الفندق',
            'image.required' =>'يرجي ادخال صور الشركه ',
           
        ]);
       // حفظ الصورة باستخدام الاسم الجديد في المجلد public/images
       
        // احفظ الصورة في المسار المحدد
        $car = car::find($id);
        $car->update([
            'name_company' => $request->name_company,
            'description' => $request->description,
            'address' => $request->address,
            'phoenumber' => $request->phoenumber,
            'description' => $request->description,
            'image' =>$request->image,
            'email' => $request->email,
        ]);

        session()->flash('edit','تم تعديل الشركه بنجاج');
        return redirect('/Car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        car::find($id)->delete();
        session()->flash('delete','تم حذف الشركه بنجاح');
        return redirect('/Car');
    }
}
