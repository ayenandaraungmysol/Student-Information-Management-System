@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            {{--<div class="card">
                <div class="card-header ">{{ __('All Teachers') }}</div>
                <div class="card-body ">--}}
                   <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Major Subject</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Class</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($teachers as $teacher)
                     <tr>
                        <!--<th scope="row">1</th>-->
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td>{{$teacher->address}}</td>
                        <td>{{$teacher->gender}}</td>
                        <td>{{$teacher->age}}</td>
                        <td>{{$teacher->major_subject}}</td>
                        <td>{{$teacher->grade}}</td>
                        <td>{{$teacher->designation}}</td>
                        <td>{{$teacher->class->class_name}}</td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>

               {{-- </div>
            </div>--}}
        </div>
    </div>
@endsection
