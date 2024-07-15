@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Teacher') }}</div>

                    <div class="card-body">
                        <div id="success-Message"></div>
                        <div id="error-Message"></div>
                        <span id="successMessage" ></div>
                        {{--@if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif--}}
                        <form id="form" action="{{ route('teacher.store') }}" method="POST"><!--Need To Modify-->{{-- action="{{ route('student.store') }}"--}}
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control ">
                                    <span id="name-error" class="text-danger"></span>

                                   {{-- @error('name')@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control ">
                                    <span id="email-error" class="text-danger"></span>

                                    {{--@error('email')@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control ">
                                    <span id="password-error" class="text-danger"></span>

                                    {{--@error('email')@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control" >
                                    <span id="phone-error" class="text-danger"></span>
                                    {{--@error('password')@error('password') is-invalid @enderror" name="phone" required autocomplete="new-password"
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control" name="address" >
                                    <span id="address-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3"><!--It's Should be select box-->
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="Age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="age" class="form-control" name="age">
                                    <span id="age-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="MajorSubject" class="col-md-4 col-form-label text-md-end">{{ __('Major Subject') }}</label>

                                <div class="col-md-6">
                                    <input id="majorSub" type="fatherName" class="form-control" name="fatherName">
                                    <span id="majorSub-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Grade" class="col-md-4 col-form-label text-md-end">{{ __('Grade') }}</label>

                                <div class="col-md-6">
                                    <input id="grade" type="grade" class="form-control" name="grade">
                                    <span id="grade-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Designation" class="col-md-4 col-form-label text-md-end">{{ __('Desgination') }}</label>

                                <div class="col-md-6">
                                    <input id="designation" type="grade" class="form-control" name="desgination">
                                    <span id="designation-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Class" class="col-md-4 col-form-label text-md-end">{{ __('Class') }}</label>

                                <div class="col-md-6">
                                    <select name="class" id="class">
                                        @foreach ($classes as $class )
                                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Certificates" class="col-md-4 col-form-label text-md-end">{{ __('Certificates') }}</label>

                                <div class="col-md-6">
                                    @foreach ($certificates as $certificate)
                                        <div>
                                            <input type="checkbox" name="values[]" value="{{$certificate->id}}" id="option_{{ $certificate->id }}">
                                            <label for="certificates">{{ $certificate->certificates_name}}</label>
                                            {{--<input type="checkbox" name="values[]" value="{{ $option['id'] }}" id="option_{{ $option['id'] }}">
                                            <label for="option_{{ $option['id'] }}">{{ $option['name'] }}</label>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<!----><script src="{{ mix('js/app.js') }}"></script>
<script>

    $(document).ready(function () {
        //alert("ajax");
        //console.log("this is ready");
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }
        $('#form').on('submit', function (e) {
            e.preventDefault();
            $('#name-error').text('');
            $('#email-error').text('');
            $('#phone-error').text('');
            $('#age-error').text('');
            $('#grade-error').text('');
            $('#majorSub-error').text('');
            $('#address-error').text('');
            $('#password-error').text('');
            $('#designation-error').text('');

            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let phone = $('#phone').val();
            let gender = $('#gender').val();
            let age = $('#age').val();
            let grade = $('#grade').val();
            let majorSub = $('#majorSub').val();
            let address = $('#address').val();
            let designation = $('#designation').val();
            let teacher_class = $('#class').val();

            //get certificates
            var certificates = [];
                $('input[name="values[]"]:checked').each(function() {
                    certificates.push($(this).val());
                });
                //console.log('Selected Values:', selectedValues);

            let hasError = false;
            window.alert("Name: "+name+"Email: "+email+"Password:"+password+"Phone: "+phone+"Gender: "+gender+"Age: "+age+"Grade: "+grade+"Designation: "+designation+"Address: "+address+" Checked: "+certificates+"Major Subject"+majorSub+"Class:"+teacher_class);

            if (name === '') {
                $('#name-error').text('Name is required');
                hasError = true;
            }
            if (password === '') {
                $('#password-error').text('Password is required');
                hasError = true;
            }
            if (phone === '') {
                $('#phone-error').text('Phone is required');
                hasError = true;
            }
            if (designation === '') {
                $('#designation-error').text('Designation is required');
                hasError = true;
            }
            if (age === '') {
                $('#age-error').text('Age is required');
                hasError = true;
            }
            if (grade === '') {
                $('#grade-error').text('Grade is required');
                hasError = true;
            }
            if (majorSub === '') {
                $('#majorSub-error').text('Major Subject is required');
                hasError = true;
            }
            if (address === '') {
                $('#address-error').text('Address is required');
                hasError = true;
            }

            if (email === '') {
                $('#email-error').text('Email is required');
                hasError = true;
            } else if (!validateEmail(email)) {
                alert('Invalid Mail')
                console.log('validateEmail Block')
                $('#email-error').text('Invalid email format');
                hasError = true;
            }

            if (!hasError) {
               // window.alert("no error block");
               //console.log("no error part");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });

                $.ajax({

                    url: '{{route('teacher.store') }}',
                    method: 'post',
                    data: {name: name, email: email, password: password, phone: phone, address: address, gender: gender, age: age, majorSub: majorSub, grade: grade, teacher_class: teacher_class, certificates: certificates, designation: designation},

                    success: function(response) {
                        $('#success-Message').addClass('alert alert-success');
                        $('#success-Message').text(response.success).show();
                        $('#error-Message').hide();
                        $('#form')[0].reset();

                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;//response.responseJSON.errors;
                        $('#error-Message').text(errors).show();
                        $('#success-Message').hide();
                        $('#form')[0].reset();
                    }
                });

            }
           // else alert("error");
        });
    });
</script>
@endsection

