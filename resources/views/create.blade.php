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
    <form action="{{route('store')}}" method="POST">
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
                    <input type="text" name="make" required>
                </div>
                <div class="col-12 col-mar">
                    <input type="text" name="model" required>
                </div>
                <div class="col-12 col-mar">
                    <input type="number" name="year" min="1901" max="2155" required>
                </div>
                <div class="col-12 col-mar">
                    <select name="type" class="select">
                        <option value="Vehicle" selected>Vehicle</option>
                        <option value="Car">Car</option>
                        <option value="Truck">Truck</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 col-mar">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>
@endsection
