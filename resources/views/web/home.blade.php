@extends('web.layout.index')
@include('web.layout.slide')
@section('content')
    <div class="container">
        <div class="col-6 col-md-12 laptopmanu home-menu">
            @foreach($category as $item)
                <a href="#{{ $item->name }}">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>

    <div class="container">
        @foreach($products as $product)
            @if($product)
                <aside class="leftcate box" id="{{ $product[0]->category }}">
                    <div class="laptopprice container">
                        <h1>{{ $product[0]->category }}</h1>
                    </div>

                    <div class="flex-box">
                        @foreach($product as $item)
                            <div data-cate="laptop" class="lstlaptop">
                                <div class="cate mo-tl row">
                                    <div class="owl-item" data-aos="fade-up">
                                        <div>
                                            <a href="{{ route('home.product', $item->id) }}">
                                                <div class="ava">
                                                    <img width="100" height="100"
                                                         src="{{ asset('upload/sanpham/' . $item->image) }}">
                                                </div>
                                                <strong>{{ number_format($item->price, 0) }} ₫</strong>
                                                <h3>{{ $item->name }}</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </aside>
            @endif
        @endforeach
    </div>

    @if(session('thongbao'))
        <script>
            alert("Bạn đã đặt hàng thành công!");
        </script>
    @endif
@endsection
