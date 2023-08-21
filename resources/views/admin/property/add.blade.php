@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Add Category | Zamanat.pk'])
<div class="container-fluid py-4">
    <div class="row">
<div class="card">
    <div class="card-header">
        <h6>ADD Property</h6>
    </div>
    <div class="card-body">

    <form action="{{url('admin/insert-property')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row"> 
            <div class="col-md-6 mb-3">
                <label> Category </label>
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
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    Please enter a name
                </div>
                @enderror
            </div>
            {{-- <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                
                <input type="text" name="slug" class="form-control    @error('slug')is-invalid @enderror" value="{{old('slug')}}">
                
                @error('slug')
                <div class="invalid-feedback">
                    Duplicated Slug Found
                </div>
                @enderror
            </div> --}}
            <div class="col-md-12 mb-3">
                <label for="">Small Description</label>
                <textarea name="small_description" class="form-control">
                  {{old('small_description')}}</textarea></div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea  name="description" class="form-control"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Original price</label>
                <input type="text" name="original_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling price</label>
                <input type="text" name="selling_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="text" name="tax" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" name="qty" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" name="popular" class="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" class="">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Client Email Address</label>
                <input type="text" name="clientemailaddress" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Agent Commission</label>
                <input type="text" name="agent_commission" class="form-control">
            </div> 
            <div class="col-md-12 mb-3">
                <label for="">Video</label>
                <textarea name="embed_video" class="form-control"></textarea>
            </div>
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
    </div></div>
@endsection