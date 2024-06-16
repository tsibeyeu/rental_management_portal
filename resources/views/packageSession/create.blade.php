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
                                <h4>Create  packagesession
                                    <a href="{{route('packagesession.index')}}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('packagesession.store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="coache"> name</label>
                                        <input type="text" id="coache" name="name" class="form-control" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="coache">description</label>
                                        <textarea  type="text" id="coache" name="description" class="form-control" rows="4" placeholder="give some description..." required ></textarea>
                                        
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