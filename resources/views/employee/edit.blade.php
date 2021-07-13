@extends('layout')
@section('title','Update Employee')
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Update Employee
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
                        <select name="depart" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach($departs as $depart)
                                <option @if($depart->id==$data->department_id) selected @endif value="{{$depart->id}}">{{$depart->title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" value="{{$data->full_name}}" name="full_name" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <input type="file" name="photo" class="form-control" />
                        <p>
                            <img src="{{asset('public/images/'.$data->photo)}}" width="200" />
                            <input type="hidden" name="prev_photo" value="{{$data->photo}}" />
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input value="{{$data->address}}" type="text" name="address" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <input value="{{$data->mobile}}" type="text" name="mobile" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input @if($data->status==1) checked @endif type="radio" name="status" value="1" /> Activate
                        <br />
                        <input @if($data->status==0) checked @endif type="radio" name="status" value="0" /> DeActivate
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection