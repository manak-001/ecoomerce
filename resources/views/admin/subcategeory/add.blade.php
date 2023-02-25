@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New categoery</h3>
        </div>
        <form action="{{route('create.subcategory')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Catgeory</label>
                    <select class="form-control subcategory" name="subcategory[]" multiple>
                    <option value="">Select Categoery</option>
                        @foreach($data as $value)
                        <option value="{{$value->id}}">{{$value ->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


@endsection
@section('script')
<script>
    $('.subcategory').select2({
        closeOnSelect: false
    });
</script>
@stop