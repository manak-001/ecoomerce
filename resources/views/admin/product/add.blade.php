@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New categoery</h3>
        </div>
        <form action="{{route('create.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Catgeory</label>
                    <select class="form-control categoery" name="category[]" multiple>
                    <option value="">Select Categoery</option>
                        @foreach($data as $value)
                       <option value="{{$value->id}}">{{$value ->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{old('price')}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group col-md-12">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
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
    $("body").on("change", ".categoery", function() {
        var ids = $(this).val();
        $.ajax({
            method: "get",
            url: "{{route('loadSubCate')}}",
            data: {
                id: ids
            },
            success: function(response) {
                $(".subcategoery").html("");
                $(".subcategoery").append(response.data);
            }
        });
    });
   
    $('.categoery').select2({
        closeOnSelect: false
    });
    $('.subcategoery').select2({
        closeOnSelect: false
    });
</script>
@stop