@extends('layouts.app')

@section('title', 'Product')
@section('content')
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Sales And Order")}}
        </h2>
    </div>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="w-1/4 p-4 hidden sm:block break-words ">
            {{__('left')}}
        </div>
        <div class="w-full sm:w-1/2 p-4 break-words">
            <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4" id="bodyGridDiv">
                <div class="container-fluid text-center text-md-start mt-5">
                    <div class="" id="supplierProductSecGrid">
                        <div class="card p-3">
                            <div class="class='bg-image hover-overlay' data-mdb-ripple-init id='' data-mdb-ripple-color='light'" style="max-width: 100%;">
                                <a href='#!'>
                                    <div class='mask' style='background-color: rgba(251, 251, 251, 0.15); width:100%'>
                                        <p><strong>{{ $product->productName}}</strong></p>
                                        <img src="{{ asset('RetailProductImg/' .$product->productImage)}}" alt="{{ $product->productName }}" class="img-fluid" style="max-height: 200px; max-width:100%; object-fit:cover;" />
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <p><strong>product name: </strong>{{ $product->productName}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__("right")}}
        </div>
    </div>
@endsection