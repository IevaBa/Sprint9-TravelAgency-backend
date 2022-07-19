<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::with('country')->orderBy('price')->get();
        return $hotel;
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
         //VALIDATION
        $this->validate($request, [
            'title'=>'required|unique:hotels,title',
            'price'=>'required',
            'image'=>'required|image',
            'days'=>'required',
            'country_id'=>'required',
        ]);
        
        $hotel= new Hotel;
        $hotel->title=$request->input('title');
        $hotel->price=$request->input('price');
        $hotel->image=$request->file('image')->store('hotels');
        $hotel->days=$request->input('days');
        $hotel->country_id=$request->input('country_id');
        
        return ($hotel->save()==1)
        ? response()->json(['message'=>'Hotel Created Successfully!!'])
        : response()->json(['error'=>'Something went wrong while creating hotel!!'],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (\App\Models\Hotel::destroy($id) == 1) 
        ?  response()->json(['message'=>'Hotel Deleted Successfully!!'], 200) 
        :  response()->json(['error' => 'Deleting was not successful'], 500);
    }
}