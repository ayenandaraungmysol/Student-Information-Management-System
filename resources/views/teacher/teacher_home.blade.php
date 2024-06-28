@extends('layouts.teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header ">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                   <h1>Teacher Page</h1>
                   <ul>
                    <li><i class="fas fa-user-graduate"></i> All Students</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
