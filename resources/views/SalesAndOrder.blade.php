@extends('layouts.app')

@section('title', 'Sales')
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
            <div x-data="{ ShowSales:true, ShowAddProduct:false, ShowOrders:false }">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success" @click="ShowSales=true; ShowAddProduct=false; ShowOrders=false"  data-mdb-ripple-init>SALES</button>
                    <button type="button" class="btn btn-success" @click="ShowSales=false; ShowAddProduct=true; ShowOrders=false" data-mdb-ripple-init>ADD PRODUCT</button>
                    <button type="button" @click="ShowOrders=true; ShowAddProduct=false; ShowSales=false" class="btn btn-success"  data-mdb-ripple-init>ORDERS AND INVOICE</button>
                </div>
                    <div x-show="ShowSales">
                        My sales.
                    </div>
                    <div x-show="ShowAddProduct"><br>
                        <form  action="{{ route('addRetailProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div  class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                    <label class="visually-visible" for="productName">Product name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="productName" name="productName" required placeholder="product name.." />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="visually-visible" for="productQuantity">Product quantity</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="productQuantity" name="productQuantity" required placeholder="855" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="visually-visible" for="productDescription">Product description</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="productDescription" name="productDescription" required placeholder="855 kilograms" />
                                    </div>
                                </div>
                            </div><br>
                            <div  class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                    <label class="visually-visible" for="productSellingPrice">Product selling price</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Ksh</div>
                                        <input type="number" class="form-control" id="productSellingPrice" name="productSellingPrice" required placeholder="2000" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="visually-visible" for="sellingPriceDescription">Selling price description</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sellingPriceDescription" name="sellingPriceDescription" required placeholder="2000 per kilogram" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="visually-visible" for="productImage">Product image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="productImage" name="productImage" required />
                                    </div>
                                </div>
                            </div><br>
                            <div  class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                    <label class="visually-visible" for="productTerms">Product terms</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="productTerms" name="productTerms" required placeholder="payment on delivery"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button data-mdb-ripple-init type="submit" name="submit" class="btn btn-danger">ADD PRODUCT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div x-show="ShowOrders">
                        My Orders
                    </div>
            </div>
            <!-- //////////// -->
            @if(session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

             <!-- /////////////// -->
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection