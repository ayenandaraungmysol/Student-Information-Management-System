@extends('layouts.teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header ">{{ __('Teacher Profile') }}</div>
                <div class="card-body ">
                    <h3>{{$teacher_info->name}}</h3>
                    <span>Email: {{$teacher_info->email}}</span><br>
                    <span>Phone: {{$teacher_info->phone}}</span><br>
                    <span>Designation: {{$teacher_info->designation}}</span><br>
                    <span>Address: {{$teacher_info->address}}</span><br>
                    <span>Certificates: </span>
                    @if ($certificates->isEmpty())
                        {{"There is no Certificates"}}
                    @else
                        @foreach ($certificates as $certificate)
                        <li>{{ $certificate->certificates_name }}</li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
