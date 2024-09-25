@extends('layouts.app')

@section('title', 'Inventory')
@section('content')
    <section name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Inventory Tracking")}}
        </h2>
    </section>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="w-1/4 p-4 hidden sm:block break-words ">
            {{__('left')}}
        </div>
        <div class="w-full sm:w-1/2 p-4 break-words">
            <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4" id="bodyGridDiv">
                <div class="container-fluid text-center text-md-start mt-5">
                    <div class="" id="">
            <!-- <ul> -->
            @foreach($supplierProducts as $supplierProduct)
                <!-- <li> -->
                <div class="card">
                    <div class="container-fluid">
                        <a href="{{ route('supplierProductDetails', ['productId' => $supplierProduct->productId]) }}">
                        <img class="block h-9 w-auto fill-current text-gray-800"  src="{{ asset('RetailProductImg/' . $supplierProduct->productImage) }}" alt="{{ $supplierProduct->productName }}" />
                        </a>
                    <strong>{{ $supplierProduct->productName }}</strong> - Ksh{{ number_format($supplierProduct->productSellingPrice, 2) }}
                    <p>{{ $supplierProduct->productDescription }}</p>
                    </div><!-- Display product image -->
                </div>
                <!-- </li> -->
            @endforeach
        <!-- </ul> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection