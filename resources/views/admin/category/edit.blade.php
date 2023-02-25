@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New categoery</h3>
    </div>
    <form action="{{route('update.category')}}" method="post" >
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="card-body row">
            <div class="form-group col-md-12">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}">
            </div>
 </div>
        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</div>
</div>


@endsection