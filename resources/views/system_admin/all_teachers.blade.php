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
                        <th scope="col">Delete Action</th>
                        <th scope="col">Edit Action</th>
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
                       <td>
                            <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                        {{--<td><a href="{{route('teacher.delete', $teacher->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        <td><a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                        --}}

                        <td><form action="{{ route('teacher.update', $teacher->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" ><i class="fas fa-edit"></i></button>
                        </form></td>
                      </tr>
                     @endforeach
                    </tbody>
                    <div>
                        {{--
                        <div class="d-flex">
                            <div class="mx-auto">
                            {{$teachers->links()}}
                            </div>
                        </div>--}}
                    </div>
                  </table>

        </div>
    </div>
@endsection
