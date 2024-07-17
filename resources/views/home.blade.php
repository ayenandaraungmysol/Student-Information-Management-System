@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Auth::user()->role->role_name}}
                    <br>
                    <h2>{{__("Need to Send Email the following Teachers")}}</h2>
                    <h3>{{"Old Teachers"}}</h3>
                    @foreach ($old_teachers as $old_teacher )
                        <span>{{$old_teacher->name}}</span>
                        <span>{{$old_teacher->class_id}}</span>
                    @endforeach

                    <h3>{{"New Teachers"}}</h3>
                    @foreach ($new_teachers as $new_teacher )
                        <span>{{$new_teacher->name}}</span>
                        <span>{{$new_teacher->class_id}}</span>
                    @endforeach

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
