<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    static public function list() {
        return DB::table('cars')
            ->leftJoin('clients', 'cars.holder_id', '=', 'clients.id')
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

    static public function getCarsByClient($id) {
        return DB::table('cars')->where('holder_id', '=', $id)->get()->toArray();
    }

    static public function createCar($data) {
        return DB::table('cars')->insert([
            'holder_id'=>$data['holder_id'],
            'brand'=>$data['brand'],
            'model'=>$data['model'],
            'color'=>$data['color'],
            'license_plate'=>$data['license_plate'],
            'code_region'=>$data['code_region']
        ]);
    }

    static public function deleteCar($id) {
        return DB::table('cars')->delete($id);
    }

    static public function updateCar($data, $id) {
        return DB::table('cars')->where('id', '=', $id)->update([
            'is_parked'=>$data
        ]);
    }
}
