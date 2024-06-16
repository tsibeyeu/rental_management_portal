@extends('layouts.layout')
@section('content')
<x-nav-bar.navbar/>
<div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"></h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active"></li>
                    </ol>            
             </div>
            <div class="container mt-5">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Package
                                    <a href="{{route('trainingpackage.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('trainingpackage.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="trainingpackage_id" value="{{$trainingPackage->id}}">
                                    <div class="mb-3">
                                        <label for="package">name</label>
                                        <input type="text" id="package" name="name" class="form-control" value="{{$trainingPackage->name}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package">description</label>
                                        <input type="text" id="package" name="description" class="form-control" value="{{$trainingPackage->description}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package"> price</label>
                                        <input type="text" id="package" name="price" class="form-control" value="{{$trainingPackage->price}}" required />
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">store</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
   </div>
@endsection