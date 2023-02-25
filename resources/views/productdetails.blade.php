@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="row">

            <div class="col-md-4">
                <img src="{{asset( 'storage/'.$product->image)}}" width="100%">
                <button class="btn btn-primary mt-2 mb-2" style="margin-left:25px;">Add To Card</button>
                <span> </span>
                <button class="btn btn-primary mt-2 mb-2" style="margin-left:70px">Buy Now </button>
            </div>
            <div class="col-md-8">
                <b>
                    <h5 style="margin-top:20px">{{Ucfirst($product->name)}}</h5>
                </b></br>
                <label>Categoery : </label>
                @foreach($produc_addon as $addon)
                {{$addon->name}},
                @endforeach
</br>
                <label>Addon : </label>
                @foreach($sub_cates as $sub_cates)
                {{$sub_cates->name}}
                 @endforeach
                <b>
                    <h6>${{$product->price}}</h6>
                </b>
                <p style="margin-top: 40px;">{{$product->description}}</p>
            </div>
        </div>
    </div>
</div>
@endsection