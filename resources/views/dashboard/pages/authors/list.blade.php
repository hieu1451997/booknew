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
                    <a href="#">List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success " role="alert">
                        {{ session('success') }}
                        
                    </div>
                    @endif
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List Authors</h4>
                            <a href="{{URL::to('/Authors/add')}}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Add Authors
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 30%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($authors as $item)
                                    <tr>
                                        <td><img src="{{asset('uploads/authors/' . $item->avatar)}}" alt="Image" width="100" height="100"></td>
                                        <td>{{$item->name}} </td>
                                        <td>{{$item->description}} </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('authors.edit',$item->id)}}" class="btn btn-link btn-primary btn-lg" title="Edit {{$item->name}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('authors.destroy',$item->id)}}" method="POST" style="margin: auto">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link btn-danger" type="submit" data-toggle="tooltip" title=""  data-original-title="Delete {{$item->name}}"
                                                        onclick="return confirm('Delete {{$item->name}} Authors')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>      
                                            </div>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection