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
                    <a href="#">Add</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Authors</h4>
                        </div>
                        <form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="authors">Authors Name</label>
                                            <input type="text" class="form-control" name="name" id="authors" placeholder="Enter name" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <div style="color: red;">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Avatar</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar" required>
                                            @if ($errors->has('avatar'))
                                                <div style="color: red;">{{ $errors->first('avatar') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea class="form-control" id="desc" rows="5" name="description">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Add Authors</button>
                            </div>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection