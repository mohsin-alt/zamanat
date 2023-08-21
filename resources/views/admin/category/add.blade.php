@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'All Categories | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header">
        <h6>Add category</h6>
    </div>
    <div class="card-body">

    <form action="{{url('admin/insert-category')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">
                    Please enter a name
                </div>
                @enderror
            </div>
            {{-- <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div> --}}
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea  name="description" class="form-control"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" name="popular" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" class="">
            </div>
            {{-- <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_descrip" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control"></textarea>
            </div> --}}
            <div class="col-md-12 mb-3">
                
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                
                <button type="submit" class="bt btn-primary">Submit</button > 
            </div>
        </div>
    </form>
    </div>
</div>
    </div>
</div>
@endsection