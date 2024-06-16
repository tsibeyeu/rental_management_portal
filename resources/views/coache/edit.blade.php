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
                                <h4>update coache
                                    <a href="{{route('coache.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('coache.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="coache_id" value="{{$coache->id}}">
                                    <div class="mb-3">
                                        <label for="package">name</label>
                                        <input type="text" id="package" name="name" class="form-control" value="{{$coache->name}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package">Email</label>
                                        <input type="text" id="package" name="email" class="form-control" value="{{$coache->email}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package"> phone number</label>
                                        <input type="text" id="package" name="phone_number" class="form-control" value="{{$coache->phone_number}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package"> expertise</label>
                                        <input type="text" id="package" name="expertise" class="form-control" value="{{$coache->expertise}}" required />
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