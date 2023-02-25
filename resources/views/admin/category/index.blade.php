@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
    Category
            <a href="{{route('add.category')}}" class="btn btn-primary float-end" style="float:right" >Add</a>
           
        </div>
        <table class="table " border="1px">
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
                        <a href="{{route('edit.category',$value->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete.category',$value->id)}}" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection