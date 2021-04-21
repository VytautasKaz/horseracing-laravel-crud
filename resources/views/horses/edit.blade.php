@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit horse:</div>
                    <div class="card-body">
                        <form action="{{ route('horse.update', $horse->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $horse->name }}">
                            </div>
                            <div class="form-group">
                                <label>Runs:</label>
                                <input type="number" name="runs" class="form-control" value="{{ $horse->runs }}">
                            </div>
                            <div class="form-group">
                                <label>Wins:</label>
                                <input type="number" name="wins" class="form-control" value="{{ $horse->wins }}">
                            </div>
                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="mce" name="about" rows=10 cols=100
                                    class="form-control">{{ $horse->about }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
