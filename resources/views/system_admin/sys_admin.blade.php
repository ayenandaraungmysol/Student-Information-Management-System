@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header ">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                   <h1>System Admin</h1>
                   <ul>
                    <li><i class="fas fa-user-graduate"></i> All Students</li>
                    <li><i class="fas fa-user-plus"></i> Create Students</li>
                    <li><i class="fas fa-chalkboard-teacher"></i> All Teachers</li>
                    <li><i class="fas fa-user-plus"></i> Create Teachers</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

