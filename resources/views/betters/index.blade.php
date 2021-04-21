@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <div style="margin-bottom: 32px;" class="card-body">
            <form class="form-inline" action="{{ route('better.index') }}" method="GET">
                <select style="margin-right: 20px;" name="horse_id" id="" class="form-control">
                    <option value="" selected disabled>Choose a horse to filter by</option>
                    @foreach ($horses as $horse)
                        <option value="{{ $horse->id }}" @if ($horse->id == app('request')->input('horse_id')) selected="selected" @endif>{{ $horse->name }}</option>
                    @endforeach
                </select>
                <button style="margin-right: 10px;" type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href={{ route('better.index') }}>Show All</a>
            </form>
        </div>
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Bet(€)</th>
                <th>Horse</th>
                <th>Actions</th>
            </tr>
            @foreach ($betters as $better)
                <tr>
                    <td>{{ $better->name }}</td>
                    <td>{{ $better->surname }}</td>
                    <td>{{ $better->bet }}</td>
                    <td>{{ $better->horse->name }}</td>
                    <td>
                        <form action={{ route('better.destroy', $better->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('better.edit', $better->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('better.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
