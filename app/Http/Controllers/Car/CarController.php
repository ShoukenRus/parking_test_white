<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private function validateDataCar($request){

        return $request->validate([
            'brand'           => 'required|min:3',
            'model'           => 'required|min:3',
            'color'           => 'required|min:3',
            'license_plate'   => 'required|string|unique:cars',
            'code_region'     => 'required|numeric',
            'is_parked'       => 'boolean'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $client_id = $request->holder_id;
        Car::createCar($this->validateDataCar($request), $client_id);
        return redirect(route('client.edit', $client_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $is_parked = $request->is_parked == 'on' ? true : false;
        Car::updateCar($is_parked, $id);
        return redirect(route('client.edit', $request->holder_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Car::deleteCar($id);
        return redirect(route('client.index'));
    }
}
