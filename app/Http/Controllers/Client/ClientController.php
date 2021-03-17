<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    /**
     * @param $request
     * @return mixed
     */
    private function validateDataClient($request){
        $rule_phone = $request->_method == 'PATCH' ? 'required' : 'required|unique:clients';
        $request->is_male = $request->is_male == '1' ? true : false;
        return $request->validate([
            'firstname'  => 'required|min:3',
            'lastname'   => 'required|min:3',
            'middlename' => 'required|min:3',
            'is_male'    => 'required|string',
            'phone'      => $rule_phone,
            'address'    => 'required|string'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Client::list();
//        dd($data);
        return view('client_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_id = Client::store($this->validateDataClient($request));
        return redirect(route('client.edit', $client_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $client = Client::getClient($id);
        $clientCars = Car::getCarsByClient($id);
        return view('client_edit', ['client'=>$client, 'cars'=>$clientCars]);
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
        Client::updateClient($this->validateDataClient($request), $id);
        return redirect(route('client.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {

    }
}
