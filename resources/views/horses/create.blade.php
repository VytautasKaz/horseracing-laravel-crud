@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status_success'))
                    <p style="color: green"><b>{{ session('status_success') }}</b></p>
                @else
                    <p style="color: red"><b>{{ session('status_error') }}</b></p>
                @endif
                <div class="card">
                    <div class="card-header">Add a new horse:</div>
                    <div class="card-body">
                        <form action="{{ route('horse.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Runs:</label>
                                <input type="number" name="runs" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Wins:</label>
                                <input type="number" name="wins" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
