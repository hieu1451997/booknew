@extends('dashboard.layouts.master')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">BookShop</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Authors</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Authors</h4>
                        </div>
                        <form action="{{route('authors.update',$authors->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="authors">Authors Name</label>
                                            <input type="text" class="form-control" name="name" id="authors" value="{{$authors->name}}">
                                            @if ($errors->has('name'))
                                                <div style="color: red;">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="product_image">Current Avatar</label>
                                            <img src="{{ asset('uploads/authors/' . $authors->avatar) }}" alt="{{ $authors->avatar }}" style="max-width: 100px; display: block;">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Change Avatar</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea class="form-control" id="desc" rows="5" name="description">
                                                {{$authors->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>  
                        </form>                                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection