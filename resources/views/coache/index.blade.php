@extends('layouts.layout')
@section('content')
<x-NavBar.navbar/>
<x-table.tableitems>

<x-table-header.table-header>
        Coahes    <a href="{{route('coache.create')}}"class="btn btn-primary float-end">Add Coache</a>
    </x-table-header.table-header>
 <div class="container-fluid px-4">
    <div class="card-body">
    <table id="datatablesSimple" class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>Expertise</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coaches as $coache)
        <tr>
            <td>{{$coache->name}}</td>
            <td>{{$coache->email}}</td>
            <td>{{$coache->phone_number}}</td>
            <td>{{$coache->expertise}}</td>
            <td> <form action="{{route('coache.edit')}}" method="get">
                <input type="hidden" name="coache_id" value="{{$coache->id}}"/>
                <button type="submit" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></</button>
            </form>
            </td>
            <td> <form action="{{route('coache.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="coache_id" value="{{$coache->id}}"/>
                <button type="submit"class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></</button>
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