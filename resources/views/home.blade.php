@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="text-align: center;">
                <h1>Welcome to my horse racing betting site!</h1>
                @if (!auth()->check())
                    <p>Register/Login to see the content.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
