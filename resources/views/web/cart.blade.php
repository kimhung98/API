@extends('web.layout.index')
@section('content')
    <div class="view-cart">
        <div class="container">
            <div class="row justify-content-center"
                 @if(Cart::Subtotal($decimals = 0) == 0)
                 style="margin-bottom: 131px"
                @endif>
                <div class="mx-auto col-sm-12 col-md-10 col-lg-8 col-xl-7" style="margin-bottom: 100px">
                    <div class="titlepay">
                        <span>
                            <a href="{{ route('home') }}"> <i style="font-size: 20px"><</i>Other Products</a>
                        </span>
                        <span class="rightcart">My Shopping Cart</span>
                    </div>
                    <div class="cart">
                        <div class="row">
                            @foreach (Cart::content() as $item)
                                <div class="col-md-2">
                                    <img width="90" height="70" style="margin-top: 6px"
                                         src="{{ asset('upload/sanpham/' . $item->options->image) }}">
                                    <form action="{{ route('destroy.cart', $item->rowId) }}" method="post">
                                        <button class="del">
                                            <i class="fas fa-times-circle"></i>Xóa
                                        </button>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                                <div class="col-md-10">
                                    <div class="row card-detail">
                                        <div class="col-md-7 pricename">
                                            <a href="{{ route('home.product', $item->id) }}" style="color: red">
                                                {{$item->name}}
                                            </a>
                                            <p style="color: #0c0c0c">Bạn đã mua {{$item->qty}} sản phẩm</p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="float-right">Price: {{ number_format($item->price) }} đ</p>
                                        </div>
                                    </div>

                                    <div class="total-1">
                                        <span>Total: </span>
                                        <span>{{ number_format($item->price * $item->qty) }} đ</span>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="payend">

                                    <div class="price">
                                        <b>Total bill:</b>
                                        <strong>{{ Cart::Subtotal($decimals = 0) }} đ</strong>
                                    </div>
                                </div>

                                <div class="freeship">
                                    <i class="fas fa-check-circle"></i>
                                    Đơn hàng được <b>miễn phí</b> giao hàng
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pull-right">
                                @if(Auth::check())
                                    <form action="{{ route('payment') }}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-primary">Payment</button>
                                    </form>
                                @else
                                    <a class="btn btn-primary"
                                       href="{{ route('user.login') }}?destination=shopping-cart">Payment</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
