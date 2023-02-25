@extends('admin.layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit SubCategoery</h3>
        </div>
        <form action="{{route('update.subcategory')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                </div>
                <div class="form-group col-md-12">
                    <label>Catgeory</label>
                    <select class="form-control subcategoery" name="subcategoery[]" multiple>
                        <option value="">Select Categoery</option>
                        @foreach($cates as $value)

                        <?php
                        $selected = "";
                        ?>
                        @foreach($addon as $old_subcate)
                        <?php
                        if ($old_subcate->cates_id == $value->id) {
                            $selected =  "selected";
                        }
                        ?>
                        @endforeach
                        <option value="{{$value->id}}" {{$selected}}>{{$value->name}}</option>
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
    $('.subcategoery').select2({
        closeOnSelect: false
    });
</script>
@stop