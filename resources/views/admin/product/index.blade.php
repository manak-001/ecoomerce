@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            Product
            <a href="{{route('add.product')}}" class="btn btn-primary float-end" style="float:right">Add</a>
        </div>
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Crerate At</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key=> $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td><?php 
                    $comma_string = array();?>
                        @foreach($value->productcategory as $category)
                        <?php 
                        $comma_string[] = $category->category->name;?>
                         @endforeach
                         {{implode(",", $comma_string)}}
                    </td>
                    <td>{{$value->price}}</td>
                    <td><img src="{{asset( 'storage/'.$value->image)}}" width="100"></td>
                    <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                    <td>
                        <a href="{{route('edit.product',$value->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete.product',$value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection