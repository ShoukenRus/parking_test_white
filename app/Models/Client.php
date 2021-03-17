<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    static public function list() {
        return DB::table('clients')
            ->leftJoin('cars', 'clients.id', '=', 'cars.holder_id')
            ->orderBy('lastname', 'asc')
            ->orderBy('firstname', 'asc')
            ->orderBy('middlename', 'asc')
            ->select('cars.id as car_id',
                'cars.brand',
                'cars.model',
                'cars.license_plate',
                'clients.lastname',
                'clients.firstname',
                'clients.middlename',
                'clients.id as client_id')
            ->paginate(7);
    }

    static public function store($data) {

        return DB::table('clients')->insertGetId([
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'middlename'=>$data['middlename'],
            'is_male'=>$data['is_male'],
            'phone'=>$data['phone'],
            'address'=>$data['address']
        ]);
    }

    static public function getClient($id) {
        return DB::table('clients')->where('id', '=', $id)->first();
    }

    static public function updateClient($data, $id) {
        return DB::table('clients')->where('id','=', $id)->update($data
//            'firstname'=>$data->firstname,
//            'lastname'=>$data->lastname,
//            'middlename'=>$data->middlename,
//            'is_male'=>$data->is_male,
//            'phone'=>$data->phone,
//            'address'=>$data->address
        );
    }


}
