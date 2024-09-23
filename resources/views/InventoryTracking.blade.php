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
            {{__('center')}}
            <ul>
            @foreach($supplierProducts as $supplierProduct)
                <li>
                    <strong>{{ $supplierProduct->productName }}</strong> - ${{ number_format($supplierProduct->productSellingPrice, 2) }}
                    <p>{{ $supplierProduct->productDescription }}</p>
                    <img class="block h-9 w-auto fill-current text-gray-800"  src="{{ asset('RetailProductImg/' . $supplierProduct->productImage) }}" alt="{{ $supplierProduct->productName }}" /> <!-- Display product image -->
                </li>
            @endforeach
        </ul>
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection