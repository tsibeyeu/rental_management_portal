@extends('layouts.layout')
@section('content')
<x-NavBar.navbar/>
<x-table.tableitems>
<x-table-header.table-header>
        membershipTypes  <a  href="{{route('membershipType.create')}}" class="btn btn-primary float-end">Add membershipType </a>
    </x-table-header.table-header>
 <div class="container-fluid px-4">
    <div class="card-body">
    <table id="datatablesSimple" class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($membershipTypes as $membershipType)
        <tr>
            <td>{{$membershipType->name}}</td>
            <td>{{$membershipType->price}}</td>
            <td> <form action="{{route('membershipType.edit')}}" method="get">
                <input type="hidden" name="membershipType_id" value="{{$membershipType->id}}"/>
                <button type="submit" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></button>
            </form>
            </td>
            <td> <form action="{{route('membershipType.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="membershipType_id" value="{{$membershipType->id}}"/>
                <button type="submit"class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></</button>
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