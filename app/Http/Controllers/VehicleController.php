<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Car;
use App\Truck;
class VehicleController extends Controller
{
    protected $_vehicle;
    protected $types=[
        'Vehicle' => Vehicle::class,
        'Car' => Car::class,
        'Truck' => Truck::class,
    ];

    public function __construct(Vehicle $vehicle)
    {
        $this->_vehicle = $vehicle;
    }
    /**
     * Load all vehicles
     */
    public function index()
    {
       $allVehicles = $this->_vehicle->all()->sortByDesc('likes');;
       return view('vehicles',['all' => $allVehicles]);
    }


    public function create()
    {
        return view('create');
    }

    /**
     * Store all kinds of vehicles
     */
    public function store(Request $request)
    {
            $request->validate([
                'model' => 'required|max:255',
                'make' => 'required|max:255',
                'year' => 'required|integer|digits:4|min:1901|max:2155',
                'type' => 'required|in:Vehicle,Car,Truck'
            ]);
            $vehicle_type = $this->types[$request->type];
            $new_v = new $vehicle_type;
            $new_v->model = $request->model;
            $new_v->make = $request->make;
            $new_v->year = $request->year;
            $new_v->save();

            return redirect()->back()->with('message', 'Vehicle Added Succesfully');
        }

    public function edit($id)
    {
        $v = Vehicle::findOrFail($id);
        return view('edit',['vehicle'=>$v]);
    }

    /**
     * Update all kinds of vehicles
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required|max:255',
            'make' => 'required|max:255',
            'year' => 'required|integer|digits:4|min:1901|max:2155',
            'type' => 'required|in:Vehicle,Car,Truck'
        ]);
        $upd_v = Vehicle::findOrFail($id);
        $upd_v->model = $request->model;
        $upd_v->make = $request->make;
        $upd_v->year = $request->year;
        $upd_v->type = $request->type;
        $upd_v->save();
        return redirect()->back()->with('message', 'Vehicle Updated Succesfully');
    }

    /**
     * Remove a vehicle
     */
    public function remove($id)
    {
        $v = Vehicle::findOrFail($id);
        $v->delete();
        return redirect()->back();
    }

    public function like($id)
    {
        $v = Vehicle::findOrFail($id);
        $v->increment('likes');
        return redirect()->back();
    }
}
