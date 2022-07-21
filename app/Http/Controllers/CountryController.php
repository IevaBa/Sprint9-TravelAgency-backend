<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country= Country::orderBy('title')->get();
        return $country;
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
            'title'=>'required|unique:countries,title',
            'season'=>'required',
        ]);
        
        $country= new Country;
        $country->title=$request->get('title');
        $country->season=$request->get('season');

        return ($country->save()==1)
        ? response()->json(['message'=>'Country Created Successfully!!' ])
        : response()->json(['error'=>'Something went wrong while adding new country!!'],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Country::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
  
        'title' => 'required|unique:countries,title, '.$id.',id',
        'season' => 'required',]);

        $country = Country::find($id);
        $country->fill($request->all());

        return ($country->save() !== 1)
        ? response()->json(['message'=>'Country Edited Successfully!!' ])
        : response()->json(['error'=>'Something went wrong while editing country!!'],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (\App\Models\Country::destroy($id) == 1) 
        ? response()->json(['message'=>'Country Deleted Successfully!!'], 200) 
        : response()->json(['error' => 'Deleting was not successful'], 500);
    }
}