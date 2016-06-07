@extends('layouts.admin')
 
@section('Admin shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/product/new"><button class="btn btn-success">New Product</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Image</td>
                    <td></td>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}$</td>
                            <td>{{$product->picture_url}}</td>
                            <td><a href="/admin/product/destroy/{{$product->id}}"><button class="btn btn-danger">Del</button></a></td>
                            <td><a href="/admin/product/edit/{{$product->id}}"><button class="btn btn-info">Update</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
@endsection