<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    static public function getCarsByClient($id) {
        return DB::table('cars')->where('holder_id', '=', $id)->get()->toArray();
    }

    static public function createCar($data, $holder_id) {
        return DB::table('cars')->insert([
            'holder_id'=>$holder_id,
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
