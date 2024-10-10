@extends('layouts.app')

@section('title', 'Inventory')
@section('content')
    <section name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Inventory Tracking")}}
        </h2>
    </section>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="container-fluid text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- side bar grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-1">
                    {{__('left')}}
                </div>
                <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4" id="bodyGridDiv">
                    <div class="container-fluid text-center text-md-start mt-5">
                        <div class="" id="supplierProductSecGrid">
                            @foreach($supplierProducts as $supplierProduct)
                                <div class="card">
                                    <div class="container-fluid">
                                    <strong>{{ $supplierProduct->productName }}</strong> - Ksh{{ number_format($supplierProduct->productSellingPrice, 2) }}
                                        <a href="{{ route('supplierProductDetails', ['productId' => $supplierProduct->productId]) }}">
                                        <img class="block h-9 w-auto fill-current text-gray-800"  src="{{ asset('RetailProductImg/' . $supplierProduct->productImage) }}" alt="{{ $supplierProduct->productName }}" title="explore" />
                                        </a>
                                        <strong>Available</strong> - {{ number_format($supplierProduct->productQuantity, 0) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    {{__('right')}}
                </div>
            </div>
        </div>
    </div>
@endsection