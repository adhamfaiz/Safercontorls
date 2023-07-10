<?php

namespace App\Http\Controllers;
use App\Models\Addhotel;
use App\Models\Detelshotel;
use Illuminate\Http\Request;

class DetelshotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showDetelshotel= detelshotel::all();
         
        return view('addhotel.showDetelshotel',compact('showDetelshotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function create()
    {
        $showDetelshotel= detelshotel::all();
        $showDetelshotel= addhotel::all();
        return view('addhotel.Detelshotel',compact('showDetelshotel'));
    }
    public function hoteldetels($hotelId)
    {
        $hoteldetels = detelshotel::where('rooms_id', $hotelId)->get();
        return response()->json( $hoteldetels );
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
            'numRoom' => 'required|unique:detelshotels|',
            'imgroomone' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'imgroomtow' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'imgroomthree' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'imgroomfour' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ],[

            'numRoom.required' =>'يرجي ادخال رقم الغرفه',
            'numRoom.unique' =>'اسم  الغرفه مسجل مسبقا',
            'floor.required' =>'يرجي ادخال باقي العنوان',
            'numofroom.required' =>'يرجي ادخال وصف الغرفه',
            'numFmaily.required' =>'يرجي ادخال  رقم الهاتف',
            'contentHotel.required' =>'يرجي ادخال  تقييم الفندق',
            'avalibaleroom.required' =>'يرجي ادخال صور الفندق ',

        ]);
        $hotel = new detelshotel;
        if ($request->hasFile('imgroomone')) {
            $image = $request->file('imgroomone');
            $image = $request->file('imgroomtow');
            $image = $request->file('imgroomthree');
            $image = $request->file('imgroomfour');
            $imageName = time().'.'.$image->extension();
            $path = $image->storeAs('public/images', $imageName);
            $hotel->numRoom = $request->numRoom;
             $hotel->floor = $request->floor;
            $hotel->price = $request->price;
            $hotel->numofroom = $request->numofroom;
            $hotel->catgory = $request->catgory;
            $hotel->typeroom = $request->typeroom;
            $hotel->numFmaily = $request->numFmaily;
            $hotel->rooms_id = $request->contentHotel;
            $hotel->contentHotel = $request->contentHotel;
            $hotel->imgroomone = $imageName;
            $hotel->imgroomtow = $imageName;
            $hotel->imgroomthree = $imageName;
            $hotel->imgroomfour = $imageName;
            $hotel->save();
          
         }
        session()->flash('Add', 'تم اضافة الغرف بنجاح ');
        return redirect('/showDetelshotel');
 
        $input = $request->all();
        $b_exit = detelshotel::where('numRoom','=',$input['numRoom'])->all();
 
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detelshotel  $detelshotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotels= detelshotel::where('id',$id)->first();
        $updater= Detels_Room::all();
        return view('addhotel.updateDetelshotel',compact('updater','hotels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detelshotel  $detelshotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels= Detels_Room::where('id',$id)->first();
        $updater= detelshotel::all();
        return view('addhotel.updateDetelshotel',compact('updater','hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detelshotel  $detelshotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $invoices = detelshotel::findOrFail($request->hotel_id);
        $imageName = time() . '.' . $request->imgroomone->extension();
        $request->imgroomone->move(public_path('images/hotels'), $imageName);
        $imageNam = time() . '.' . $request->imgroomtow->extension();
        $request->imgroomtow->move(public_path('images/hotels'), $imageName);
        $imageNa = time() . '.' . $request->imgroomthree->extension();
        $request->imgroomthree->move(public_path('images/hotels'), $imageName);
        $imageN = time() . '.' . $request->imgroomfour->extension();
        $request->imgroomfour->move(public_path('images/hotels'), $imageName);
        $invoices->update([
            'numRoom' => $request->numRoom,
            'floor' => $request->floor,
            'numofroom' => $request->numofroom,
            'numFmaily' => $request->numFmaily,
            'hotel_id' => $request->contentHotel,
            'contentHotel' => $request->contentHotel,
            'avalibaleroom' => $request->avalibaleroom,
            'typeroom' => $request->typeroom,
            'category' => $request->category,
            'price' => $request->price,
            'imgroomone' => $request->$imageName,
            'imgroomtow' => $request->$imageNam,
            'imgroomthree' => $request->$imageNa,
            'imgroomfour' => $request->$imageN,
        ]);

        session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
        return redirect('/showDetelshotel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detelshotel  $detelshotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $id = $request->id;
         detelshotel::find($id)->delete();
        session()->flash('delete','تم حذف الفندق بنجاح');
        return redirect('/showDetelshotel');
    }
}
