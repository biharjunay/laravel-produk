@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <x-sidebar/>
            </div>
            <div class="col-md-9">
                @yield("router-outlet")
            </div>
        </div>
    </div>
@endsection
