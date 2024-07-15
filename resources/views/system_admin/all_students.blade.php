@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
                <h1>{{ __('All Students') }}</h1>
               {{-- <div class="card">
            </div><div class="card-header "></div><div class="card-body "></div>--}}
                   <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Class</th>
                        <th scope="col">Delete Action</th>
                        <th scope="col">Edit Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($students as $student)
                     <tr>
                        <!--<th scope="row">1</th>-->
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->grade}}</td>
                        <td>{{$student->father_name}}</td>
                        <td>{{$student->address}}</td>
                        <td>{{$student->class->class_name}}</td>
                        <td>
                            <form action="{{ route('student.delete', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        {{--<td><a href="#" class="btn btn-danger" id="{{$student->id}}"><i class="fas fa-trash"></i></a></td>--}}
                        <td>
                            <form action="{{ route('student.edit', $student->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success" id="{{$student->id}}"><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                        {{--<td><a href="#" class="btn btn-success" id="{{$student->id}}"><i class="fas fa-edit"></i></a></td>--}}
                      </tr>

                     @endforeach
                    </tbody>
                  </table>
                  {{--{{$students->links()}}--}}
            </div>
    </div>
@endsection
