@extends('layouts.layout')
@section('content')
<x-NavBar.navbar/>
<x-table.tableitems>
    <x-table-header.table-header>
        Package    <a href="{{route('trainingpackage.create')}}" class="btn btn-primary float-end">Add Package</a>
    </x-table-header.table-header>
 <div class="container-fluid px-4">
    <div class="card-body">
    <table id="datatablesSimple" class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Assign</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trainingPackages as $trainingPackage)
        <tr>
            <td>{{$trainingPackage->name}}</td>
            <td>{{$trainingPackage->price}}</td>
            <td>{{$trainingPackage->description}}</td>
            <td> <form action="{{route('member.create')}}" method="get">
                <input type="hidden" name="trainingpackage_id" value="{{$trainingPackage->id}}"/>
                <button type="submit" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-tasks'></i></button>
            </form>
            </td>
            <td> <form action="{{route('trainingpackage.edit')}}" method="get">
                <input type="hidden" name="trainingpackage_id" value="{{$trainingPackage->id}}"/>
                <button type="submit" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></button>
            </form>
            </td>
            <td> <form action="{{route('trainingpackage.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="trainingpackage_id" value="{{$trainingPackage->id}}"/>
                <button type="submit" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash-alt'></i></</button>
            </form>
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</x-table.tableitems>
@endsection