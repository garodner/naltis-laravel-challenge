@extends('layout.master')
@section('content')
<div class="container">
    @if(session()->has('message'))
    <div class="row justify-content-center align-self-center" style="margin-right:10%">
        <div class="col-5 alert alert-success">
            {{ session()->get('message') }}
        </div>
    </div>
    @endif
    <form action="{{route('update',[$vehicle->id])}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-4 row text-right" >
                <div class="col-12 col-mar">
                    <label>model</label>
                </div>
                <div class="col-12 col-mar">
                    <label>make</label>
                </div>
                <div class="col-12 col-mar">
                    <label>year</label>
                </div>
                <div class="col-12 col-mar">
                    <label>type</label>
                </div>
            </div>
            <div class="col-8 row" align="left">
                <div class="col-12 col-mar">
                    <input type="text" name="model" required value="{{$vehicle->model}}">
                </div>
                <div class="col-12 col-mar">
                    <input type="text" name="make" required value="{{$vehicle->make}}">
                </div>
                <div class="col-12 col-mar">
                    <input type="number" name="year" required min="1901" max="2155" value="{{$vehicle->year}}">
                </div>
                <div class="col-12 col-mar">
                    <select name="type" class="select">
                        <option value="Vehicle" {{$vehicle->type == 'Vehicle' ? 'selected' : ''}}>Vehicle</option>
                        <option value="Car" {{$vehicle->type == 'App\Car'||$vehicle->type == 'Car'  ? 'selected' : ''}}>Car</option>
                        <option value="Truck" {{$vehicle->type == 'App\Truck'||$vehicle->type == 'Truck' ? 'selected' : ''}}>Truck</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 col-mar">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
