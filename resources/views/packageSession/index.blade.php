@extends('layouts.layout')
@section('content')
<x-NavBar.navbar/>
<x-table.tableitems>
<x-table-header.table-header>
        Package Sessions   <a href="{{route('packagesession.create')}}" class="btn btn-primary float-end">Add Session</a>
    </x-table-header.table-header>
 <div class="container-fluid px-4">
    <div class="card-body">
    <table id="datatablesSimple" class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>description</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($packageSessions as $packageSession)
        <tr>
            <td>{{$packageSession->name}}</td>
            <td>{{$packageSession->description}}</td>
            <td> <form action="{{route('packagesession.edit')}}" method="get">
                <input type="hidden" name="packageSession_id" value="{{$packageSession->id}}"/>
                <button type="submit"  class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></button>
            </form>
            </td>
            <td> <form action="{{route('packagesession.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="packageSession_id" value="{{$packageSession->id}}"/>
                <button type="submit" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></</button>
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