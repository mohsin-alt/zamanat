@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Category | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header">
        <h6>EDIT category</h6>
    </div>
    <div class="card-body">

    <form action="{{url('admin/update_category/'.$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" value="{{ $category->name}}" name="name" class="form-control @error('name')is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">
                    Please enter a name
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" value="{{ $category->slug}}" name="slug"  class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea  name="description" class="form-control">{{ $category->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" {{ $category->popular == "1" ? 'checked' :''}} name="popular" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" {{ $category->status == "1" ? 'checked' :''}} name="status" class="">
            </div>
            {{-- <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" value="{{ $category->meta_title}}" name="meta_title" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_descrip" class="form-control">{{ $category->meta_descrip}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control">{{ $category->meta_keywords}}</textarea>
            </div> --}}
            @if ($category->image)
            <div class="col-md-12 mb-3">
            <img class="w-100" src="{{asset('assets/uploads/category/'.$category->image)}}"/>
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
    </div></div>
@endsection