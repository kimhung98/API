@extends('web.layout.index')

@section('content')
    <div class="view-product-detail">
        <form action="{{ route('add.cart', $product->id) }}" method="post">
            {{csrf_field()}}
            <div class="container">
                <div class="row product-detail">
                    <div class="col-md-6 text-center">
                        <div class="image">
                            <img src="{{ asset('upload/sanpham/' . $product->image) }}" width="300px"
                                 height="200px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>Category: <span>{{ $product->category_id }}</span></p>
                        </div>
                        <div>
                            <p>Supplier: <span>{{ $product->supplier_id }}</span></p>
                        </div>
                        <div>
                            <p>Name: <span>{{ $product->name }}</span></p>
                        </div>
                        <div>
                            <p>Origin: <span>{{ $product->origin }}</span></p>
                        </div>
                        <div>
                            <p>Brand: <span>{{ $product->brand }}</span></p>
                        </div>
                        <div>
                            <p>Price: <span>{{ number_format($product->price, 0) }} ₫</span></p>
                        </div>
                        <div>
                            <div>
                                <div class="quality">
                                    <span class="quality">Quantity: </span>
                                    <select name="quality">
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor;
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="col-md-4 btn btn-primary"><i class="fas fa-cart-plus"></i> Đặt
                                hàng
                            </button>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 50px">
                <div style="margin-top: 20px;">
                    <h3>Description</h3>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </form>
    </div>
@endsection

