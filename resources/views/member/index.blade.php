@extends('layouts.layout')
@section('content')
<x-NavBar.navbar/>
<x-table.tableitems>
<x-table-header.table-header>
        Members    <a href="{{route('trainingpackage.create')}}" class="btn btn-primary float-end">Add Member</a>
    </x-table-header.table-header>
 <div class="container-fluid px-4">
    <div class="card-body">
    <table id="datatablesSimple" class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>Address</th>
            <th>Member Status</th>
            <th>Action</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{$member->name}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->phone_number}}</td>
            <td>{{$member->address}}</td>
            @foreach($member->memberTrainingPackages as $memberTrainingPackage)
            <td>
            @if($memberTrainingPackage->is_active)
             <i class="fas fa-check-circle text-success"></i> 
             @else
             <i class="fas fa-times-circle text-danger"></i> 
             @endif
            </td>
           
            
           @endforeach
            <td> <form action="{{route('member.edit')}}" method="get">
                <input type="hidden" name="member_id" value="{{$member->id}}"/>
                <button type="submit"class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></button>
            </form>
            </td>
            <td> <form action="{{route('member.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="member_id" value="{{$member->id}}"/>
                <button class="btn btn-danger btn-sm delete btn-flat" type="submit" ><i class='fa fa-trash'></i></button>
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