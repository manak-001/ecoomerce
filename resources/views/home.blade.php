@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @foreach($product as $pro)
        <div class="col-md-3">
            <div class="card">

                <div class="card-body">
                <a href="{{route('product.details',$pro->id)}}" style="color:black">
                    <img src="{{asset( 'storage/'.$pro->image)}}" width="100" style="width:100%; height:148px"></br>
                    
                        <sapn>{{Ucfirst($pro->name)}}</sapn></br>
                        <sapn>${{$pro->price}}</sapn>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection