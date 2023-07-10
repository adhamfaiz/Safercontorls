<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Addhotel;
use Illuminate\Http\Request;
class AddhotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addhotel = addhotel::all();
         
        return view('addhotel.addhotel',compact('addhotel'));
    }
    public function set()
    {
        return addhotel::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addhotel = addhotel::all();
         
        return view('addhotel.Addhotl',compact('addhotel'));
        
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
            'name' => 'required|unique:addhotels|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
           
        ],[

            'name.required' =>'يرجي ادخال اسم الفندق',
            'name.unique' =>'اسم الفندق مسجل مسبقا',
            'address.required' =>'يرجي ادخال باقي العنوان',
            'file_path.required' =>'يرجي ادخال وصف الفندق',
            'phoenumber.required' =>'يرجي ادخال  رقم الهاتف',
            'category.required' =>'يرجي ادخال  تقييم الفندق',
            'image.required' =>'يرجي ادخال صور الفندق ',

        ]);
        $hotel = new addhotel;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs('public/images', $imageName);
            $hotel->name = $request->name;
            $hotel->address = $request->address;
            $hotel->phoenumber = $request->phoenumber;
            $hotel->category = $request->category;
            $hotel->file_path = $request->file_path;
            $hotel->file_name = $request->file_name;
            $hotel->image = $imageName;
            $hotel->save();
         }
          session()->flash('Add', 'تم اضافة الفندق بنجاح ');
            return redirect('/addhotel');
 
        $input = $request->all();
        $b_exit = addhotel::where('name','=',$input['name'])->all();
 
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function show(Addhotel $addhotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Addhotel $addhotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:addhotels,name,'.$id,
            'file_path' => 'required',
            'phoenumber' => 'required',
            'category' => 'required',
            'image' => 'required',
           
        ],[
            'name.required' =>'يرجي ادخال اسم الفندق',
            'name.unique' =>'اسم الفندق مسجل مسبقا',
            'address.required' =>'يرجي ادخال  العنوان',
            'file_path.required' =>'يرجي ادخال وصف الفندق',
            'phoenumber.required' =>'يرجي ادخال  رقم الهاتف',
            'category.required' =>'يرجي ادخال  تقييم الفندق',
            'image.required' =>'يرجي ادخال صور الفندق ',
           
        ]);
       // حفظ الصورة باستخدام الاسم الجديد في المجلد public/images
       
        // احفظ الصورة في المسار المحدد
        $addhotel = addhotel::find($id);
        $addhotel->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phoenumber' => $request->phoenumber,
            'file_path' => $request->file_path,
            'file_name' => $request->file_name,
            'image' =>$request->image,
            'category' => $request->category,
        ]);

        session()->flash('edit','تم تعديل الفندق بنجاج');
        return redirect('/addhotel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        addhotel::find($id)->delete();
        session()->flash('delete','تم حذف الفندق بنجاح');
        return redirect('/addhotel');
    }
}
