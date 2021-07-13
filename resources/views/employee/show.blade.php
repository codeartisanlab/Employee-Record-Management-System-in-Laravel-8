@extends('layout')
@section('title','View Employee')
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Employee
        <a href="{{url('employee')}}" class="float-end btn btn-sm btn-success">View All</a>
    </div>
    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
        <form method="post" action="{{url('employee/'.$data->id)}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Department</th>
                    <td>
                        {{$data->department->title}}
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        {{$data->full_name}}
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <img src="{{asset('public/images/'.$data->photo)}}" width="200" />
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        {{$data->address}}
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        {{$data->mobile}}
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($data->status==1) Activated @else DeActivated @endif
                        <br />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection