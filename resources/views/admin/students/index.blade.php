@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fas fa-suitcase-rolling"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.students.create') }}" class="btn btn-success pull-right">Add Student</a>
        <a href="{{ route('admin.students.indexAgeBy20') }}" class="btn btn-primary pull-right">Student Age 20</a>
        <a href="{{ route('admin.students.indexNameByAb') }}" class="btn btn-primary pull-right">Student Name Ab</a>
        <a href="{{ route('admin.students.indexPhotoNull') }}" class="btn btn-primary pull-right">Student Photo Null</a>
        <form
            action="{{route('search')}}"
            class="pull-right"
            >
            <input class="form-control" placeholder="Search by Kecamatan" type="text" name="query" id="query" value="{{request()->input('query')}}"/>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Username </th>
                            <th> Age </th>
                            <th class="text-center"> Email </th>
                            <th class="text-center"> D.O.B </th>
                            <th class="text-center"> Telephone </th>
                            <th class="text-center"> Photo </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="text-center">{{ $student->id }}</td>
                                    <td class="text-center">{{ $student->name }}</td>
                                    <td class="text-center">{{ $student->username }}</td>
                                    <td class="text-center">{{ $student->age }}</td>
                                    <td class="text-center">{{ $student->email }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($student->dob)->format('d-m-Y') }}</td>
                                    <td class="text-center">{{ $student->telephone }}</td>
                                    <td class="text-center">
                                        @if ($student->images->count() > 0)
                                            <img src="{{ asset('storage/'.$student->images->first()->full) }}" id="shipLogo" class="img-fluid" alt="img">
                                        @else
                                         <b style="color:red">No Photo</b>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.students.delete', $student->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
