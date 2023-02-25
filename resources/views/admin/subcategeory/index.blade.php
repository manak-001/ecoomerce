@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{route('add.subcategory')}}" class="btn btn-primary " style="margin-left:95%">Add</a>
        </div>
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Crerate At</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                    <td>
                        <a href="{{route('edit.subcategory',$value->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete.subcategory',$value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection