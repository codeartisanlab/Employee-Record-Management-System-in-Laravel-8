@extends('layout')
@section('title','All Departments')
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Create Department
        <a href="{{url('depart')}}" class="float-end">View All</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            
        </table>
    </div>
</div>

@endsection