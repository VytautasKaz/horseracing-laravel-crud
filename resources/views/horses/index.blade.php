@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Runs</th>
                <th>Wins</th>
                <th>Win%</th>
                <th>About</th>
                <th>Actions</th>
            </tr>
            @foreach ($horses as $horse)
                <tr>
                    <td>{{ $horse->name }}</td>
                    <td>{{ $horse->runs }}</td>
                    <td>{{ $horse->wins }}</td>
                    <td>{{ number_format(($horse->wins / $horse->runs) * 100, 2) }}</td>
                    <td>{!! $horse->about !!}</td>
                    <td>
                        <form action={{ route('horse.destroy', $horse->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('horse.edit', $horse->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('horse.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
