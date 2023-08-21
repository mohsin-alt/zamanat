@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'All Categories | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header card-header-primary"><h6 class="card-title">All Categories</h6></div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead class="text-primary">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Image</th>
    <th>Action</th>
</tr>
        </thead>
        <tbody>
            @foreach($category as $item)
            <tr>
            <td>  {{$item->id}}</td>    
            <td>  {{$item->name}}</td>
            <td>  {{$item->description}}</td>
            <td>  <img style ="max-width:200px;max-height:200px;" src="{{asset('assets/uploads/category/'.$item->image)}}"/></td>
            <td>
                <a class="btn btn-primary" href="{{url('admin/edit-category/'.$item->id)}}">Edit</a>
                <a class="btn btn-primary" href="{{url('admin/delete_category/'.$item->id)}}">Delete</a>
</td>
            </tr>
</tbody>@endforeach
        </table>
    </div>
    </div>
</div>
    </div></div>
@endsection