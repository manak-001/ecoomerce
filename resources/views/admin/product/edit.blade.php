@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Catgeory</label>
                    <select class="form-control categoery" name="category[]" multiple>
                        <option value="">Select Categoery</option>
                        <?php $selected = ""; ?>
                        @foreach($data as $value)
                        @foreach($product->productcategory as $product_addon)
                        <?php
                        if ($product_addon->cate_id == $value->id) {
                            $selected = "selected";
                        }
                        ?>
                        @endforeach
                        <option value="{{$value->id}}" {{$selected}}>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <img src="{{asset( 'storage/'.$product->image)}}" width="100" class="mt-2">
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{$product->description}}</textarea>
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
</script>
@stop