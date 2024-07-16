@extends('layouts.teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            {{--<div class="card">
                <div class="card-header ">{{ __('All Students') }}</div>--}}

                {{--<div class="card-body ">--}}
                   <h1>{{ __('All Students') }}</h1>
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
                        {{--<th scope="col">Delete Action</th>--}}
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
                       {{-- <td>
                            <form method="POST" action="{{ route('teacher.student.delete', $student->id )}}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>--}}
                        <td>
                            <form  method="GET" action="{{ route('teacher.student.edit', $student->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success" ><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                      </tr>

                     @endforeach
                    </tbody>
                  </table>

               {{-- </div>
            </div>--}}
        </div>
    </div>
@endsection
