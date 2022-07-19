<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('hotel')->orderBy('surname')->get();
        return $customer;
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
        'name' => 'required', 
        'surname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'hotel_id' => 'required'
        ]);
        
        $customer = new Customer();
        $customer->fill($request->all());

        return ($customer->save()==1)
        ? response()->json(['message'=>'Customer Created Successfully!!' ])
        : response()->json(['error'=>'Something went wrong while adding new customer!!'],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (\App\Models\Customer::destroy($id) == 1) 
        ? response()->json(['message' => 'Customer Successfully Deleted'], 200)
        : response()->json(['error' => 'Deleting was not successful'], 500);
    }
}