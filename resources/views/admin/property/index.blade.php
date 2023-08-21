@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'All Properties | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header card-header-primary"><h6 class="card-title">All Properties </h6></div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Category</th>
    <th>Small Description</th>
    <th>Description</th>
    <th>Original Price</th>
    <th>Selling Price</th>
    <th>Tax</th>
    <th>Qty</th>
    <th>Image</th>
    <th>Video</th>
    <th>Action</th>
</tr>
        </thead>
        <tbody>
            @foreach($property as $item)
            <tr>
            <td>  {{$item->id}}</td>  
            <td>  {{$item->name}}</td>
            <td>  {{$item->category->name}}</td>  
            <td>  {{$item->small_description}}</td>
            <td>  {{$item->description}}</td>
            <td>  {{$item->original_price}}</td>
            <td>  {{$item->selling_price}}</td>
            <td>  {{$item->tax}}</td>
            <td>  {{$item->qty}}</td>
            <td>  <img class ="w-100" src="{{asset('assets/uploads/property/'.$item->image)}}"/></td>
            <td>
                <iframe width="60" height="15" src="{{$item->embed_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </td>
            <td>
                <a class="btn btn-primary" href="{{url('admin/edit-property/'.$item->id)}}">Edit</a>
                <a class="btn btn-primary" href="{{url('admin/delete_property/'.$item->id)}}">Delete</a>
</td>
            </tr>
</tbody>@endforeach
        </table>
    </div>
    </div>
</div>
    </div></div>
@endsection