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
                                <h4>update member
                                    <a href="{{route('member.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('member.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="member_id" value="{{$member->id}}">
                                    <div class="mb-3">
                                        <label for="package">name</label>
                                        <input type="text" id="package" name="name" class="form-control" value="{{$member->name}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package">Email</label>
                                        <input type="text" id="package" name="email" class="form-control" value="{{$member->email}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package"> phone number</label>
                                        <input type="text" id="package" name="phone_number" class="form-control" value="{{$member->phone_number}}" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="package"> address</label>
                                        <input type="text" id="package" name="address" class="form-control" value="{{$member->address}}" required />
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