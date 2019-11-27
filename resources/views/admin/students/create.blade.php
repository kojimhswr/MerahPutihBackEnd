@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.students.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Student Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Student Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter student name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="username">Username <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="Must contains letters and numbers"></i></label>
                                            <input
                                                class="form-control @error('username') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter student username"
                                                id="username"
                                                name="username"
                                                value="{{ old('username') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('username') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email </label>
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter student email"
                                                id="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="dob">D.O.B</label>
                                            <input
                                                class="form-control mdate @error('dob') is-invalid @enderror"
                                                type="date"
                                                placeholder="Enter date of birth"
                                                id="dob"
                                                name="dob"
                                                value="{{ old('dob') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('dob') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="telephone">Telephone </label>
                                            <input
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter student telephone"
                                                id="telephone"
                                                name="telephone"
                                                value="{{ old('telephone') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('telephone') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="password">Password <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="Must contains letters, numbers and symbols"></i></label>
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                placeholder="Enter student password"
                                                id="password"
                                                name="password"
                                                value="{{ old('password') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="address">Address</label>
                                    <textarea name="address" id="address" rows="8" class="form-control"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="kecamatan">Kecamatan</label>
                                            <input
                                            class="form-control @error('kecamatan') is-invalid @enderror"
                                            type="text"
                                            placeholder="Enter student kecamatan"
                                            id="kecamatan"
                                            name="kecamatan"
                                            value="{{ old('kecamatan') }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="city">City</label>
                                            <input
                                            class="form-control @error('city') is-invalid @enderror"
                                            type="text"
                                            placeholder="Enter student city"
                                            id="city"
                                            name="city"
                                            value="{{ old('city') }}"
                                            />
                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Student</button>
                                        <a class="btn btn-danger" href="{{ route('admin.students.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/package.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#regions').select2();
        });

    </script>
@endpush
