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
                    <a href="#">Product Category</a>
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
                            <h4 class="card-title">List Category</h4>
                            <a href="{{URL::to('/ProductCategory/add')}}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Add Category
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 50%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($productCategory as $item)
                                    <tr>
                                        <td>{{$item->name}} </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('productcategory.edit',$item->id)}}" class="btn btn-link btn-primary btn-lg" title="Edit {{$item->name}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('productcategory.destroy',$item->id)}}" method="POST" style="margin: auto">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link btn-danger" type="submit" data-toggle="tooltip" title=""  data-original-title="Delete {{$item->name}}"
                                                        onclick="return confirm('Delete {{$item->name}} Product Category')">
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