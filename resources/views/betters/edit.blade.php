@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit better:</div>
                    <div class="card-body">
                        <form action="{{ route('better.update', $better->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $better->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Surname:</label>
                                <input type="text" name="surname" class="form-control" value="{{ $better->surname }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Bet(€):</label>
                                <input type="number" name="bet" class="form-control" value="{{ $better->bet }}" required>
                            </div>
                            <div class="form-group">
                                <label>Horse:</label>
                                <select name="horse_id" id="" class="form-control" required>
                                    <option value="" selected disabled>Select a horse</option>
                                    @foreach ($horses as $horse)
                                        <option value="{{ $horse->id }}" @if ($horse->id == $better->horse_id) selected="selected" @endif>{{ $horse->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
