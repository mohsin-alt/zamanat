@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Category | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header">
        <h6>EDIT property</h6>
    </div>
    <div class="card-body">

    <form action="{{url('admin/update_property/'.$property->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" value="{{ $property->name}}" name="name" class="form-control @error('name')is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">
                    Please enter a name
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" value="{{ $property->slug}}" name="slug"  class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label> category </label>
                <select class="form-control" name="cate_id">
                    <option selected>Select a category</option>
                
                    @foreach ( $category as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div> 
            <div class="col-md-6 mb-3">
                <label>Add Client</label>
                <input type="email" name="client_id" id="client_id" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea  name="small_description" class="form-control">{{ $property->small_description}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea  name="description" class="form-control">{{ $property->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Original price</label>
                <input type="text" class="form-control" value="{{ $property->original_price}}" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling price</label>
                <input type="text" class="form-control" value="{{ $property->selling_price}}" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="text" class="form-control" value="{{ $property->tax}}" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" value="{{ $property->qty}}" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" {{ $property->popular == "1" ? 'checked' :''}} name="popular" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" {{ $property->popular == "1" ? 'checked' :''}} name="status" class="">
            </div>
            {{-- <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" value="{{ $property->meta_title}}" name="meta_title" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_descrip" class="form-control">{{ $property->meta_descrip}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control">{{ $property->meta_keywords}}</textarea>
            </div> --}}
            @if ($property->image)
            <div class="col-md-12 mb-3">
            <img class="w-100" src="{{asset('assets/uploads/property/'.$property->image)}}"/>
        </div>  
            @endif
            <div class="col-md-12 mb-3">
                
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                
                <button type="submit" class="bt btn-primary">Update</button > 
            </div>
        </div>
    </form>
    </div>
</div>
@endsection