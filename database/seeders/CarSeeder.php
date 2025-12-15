<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'name' => 'Toyota Avanza',
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'year' => 2020,
            'price' => 250000,
            'color' => 'Putih',
            'engine_type' => 'Bensin',
            'fuel_type' => 'Bensin',
            'transmission' => 'Manual',
            'mileage' => 50000,
            'description' => 'Mobil keluarga yang nyaman dan irit bahan bakar untuk perjalanan keluarga.'
        ]);

        Car::create([
            'name' => 'Honda Civic',
            'brand' => 'Honda',
            'model' => 'Civic',
            'year' => 2019,
            'price' => 350000,
            'color' => 'Hitam',
            'engine_type' => 'Bensin',
            'fuel_type' => 'Bensin',
            'transmission' => 'Automatic',
            'mileage' => 30000,
            'description' => 'Sedan sporty dengan performa tinggi untuk perjalanan bisnis.'
        ]);

        Car::create([
            'name' => 'Mitsubishi Pajero',
            'brand' => 'Mitsubishi',
            'model' => 'Pajero',
            'year' => 2018,
            'price' => 500000,
            'color' => 'Silver',
            'engine_type' => 'Diesel',
            'fuel_type' => 'Diesel',
            'transmission' => 'Automatic',
            'mileage' => 80000,
            'description' => 'SUV tangguh untuk petualangan dan perjalanan off-road.'
        ]);
    }
}
