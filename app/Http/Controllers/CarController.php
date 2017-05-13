<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
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
          $car = new Car;
          $car->name = $request->name;
          $car->license_number = $request->license_number;
          $car->location = $request->location;
          $car->type = $request->type;
          $car->year = $request->year;
          $car->colour = $request->colour;
          $car->frame_number = $request->frame_number;
          $car->machine_number = $request->machine_number;
          $car->save();

          return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car, $id)
    {
      $car = Car::find($id);
      $car->name = $request->name;
      $car->license_number = $request->license_number;
      $car->location = $request->location;
      $car->type = $request->type;
      $car->year = $request->year;
      $car->colour = $request->colour;
      $car->frame_number = $request->frame_number;
      $car->machine_number = $request->machine_number;
      $car->save();

      return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car, $id)
    {
      Car::find($id)->delete();

      return "success";
    }
}
