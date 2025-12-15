<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(6); // Paginate untuk performa
        return view('pages.cars', compact('cars'));
    }

    public function adminIndex()
    {
        $cars = Car::paginate(10);
        return view('admin.index', compact('cars'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.cars-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
            'engine_type' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5024',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/assets'), $imageName);
            $data['image'] = $imageName;
        }

        Car::create($data);

        return response()->json(['message' => 'Mobil sewaan berhasil ditambahkan.']);
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('pages.car-details', compact('car'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
            'engine_type' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5024',
        ]);

        $car = Car::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($car->image && file_exists(public_path('images/assets/' . $car->image))) {
                unlink(public_path('images/assets/' . $car->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/assets'), $imageName);
            $data['image'] = $imageName;
        }

        $car->update($data);

        return response()->json(['message' => 'Mobil sewaan berhasil diupdate.']);
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        // Delete image if exists
        if ($car->image && file_exists(public_path('images/assets/' . $car->image))) {
            unlink(public_path('images/assets/' . $car->image));
        }

        $car->delete();

        return response()->json(['message' => 'Mobil sewaan berhasil dihapus.']);
    }

    public function getData()
    {
        $cars = Car::all();
        return response()->json(['data' => $cars]);
    }

    public function allPdf()
    {
        $cars = Car::all();
        $pdf = app('dompdf.wrapper')->loadView('admin.cars-pdf', compact('cars'));
        return $pdf->download('data-mobil-sewaan.pdf');
    }
}
