@extends('layouts.master')

@section('Esscents Naturals | Products', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <!--Tin Product Area-->
    <section class="category">
        <div class="midbox">
            <div class="line"></div>
        </div>
        <div class="midbox">
            <h2 id="tinCandles">Tin Candles</h2>
        </div>
        <div class="midbox">
            <div class="line"></div>
        </div>
    </section>
    <section class="main">
        <img src="images/tin/tin_main.jpg" id="mainImgTin" class="mainImg">
        <div class="info">
            <div class="details">
                <div id="tinDetails">
                    <div id="tinTitle">
                        Tin Candles
                    </div>
                    <article id="tindescript">
                        These candles are handmade and placed in a cozy tin that looks great sitting anywhere in the house. Essential oils are the key ingredient that makes these candles special and smell amazing.
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div id="listImg">
    @foreach ($products['tin'] as $product)
        <div class="thumbnail">
            <img src="{{$product->picture_url}}">
            <div class="caption">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <h4>${{$product->price}}</h4>
                <div class="buyInfo">
                    <form method="POST" id ="{{$product->id}}" action="cart/{{$product->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <button type="submit" class="btn btn-fefault add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </div>

                    </form>
                    <a href="{{url('cart')}}"><button class="btn btn-fefault">Go to Cart</button></a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <section class="category">
        <div class="midbox">
            <div class="line"></div>
        </div>
        <div class="midbox">
            <h2 id="glassCandles">Glass Candles</h2>
        </div>
        <div class="midbox">
            <div class="line"></div>
        </div>
    </section>
    <section class="main">
        <img src="images/glass/glass_main.jpg" id="mainImgGlass" class="mainImg">
        <div class="info">
            <div class="details">
                <div id="glassDetails">
                    <div id="glassTitle">
                        Glass Candles
                    </div>
                    <article id="glassdescript">
                        These candles are handmade and placed in an elagent glass fixture that looks great sitting anywhere in the house. Essential oils are the key ingredient that makes these candles special and smell amazing.
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div id="listImg">
    @foreach ($products['glass'] as $product)
        <div class="thumbnail">
            <img src="{{$product->picture_url}}">
            <div class="caption">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <h4>${{$product->price}}</h4>
                <div class="buyInfo">
                    <form method="POST" id ="{{$product->id}}" action="cart/{{$product->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-fefault add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                        <br />

                    </form>
                    <a href="{{url('cart')}}"><button class="btn btn-fefault">Go to Cart</button></a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <section class="category">
        <div class="midbox">
            <div class="line"></div>
        </div>
        <div class="midbox">
            <h2 id="reedDiffusers">Reed Diffusers</h2>
        </div>
        <div class="midbox">
            <div class="line"></div>
        </div>
    </section>
    <section class="main">
        <img src="images/reed/diff_main.jpg" id="mainImgReed" class="mainImg">
        <div class="info">
            <div class="details">
                <div id="reedDetails">
                    <div id="reedTitle">
                        Reed Diffusers
                    </div>
                    <article id="reeddescript">
                        These reed diffusers are handmade and last 30 days while looking great sitting anywhere in the house. Essential oils are the key ingredient that makes these reed diffusers special and smell amazing.
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div id="listImg">
    @foreach ($products['reed'] as $product)
        <div class="thumbnail">
            <img src="{{$product->picture_url}}">
            <div class="caption">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <h4>${{$product->price}}</h4>
                <div class="buyInfo">
                    <form method="POST" id ="{{$product->id}}" action="cart/{{$product->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-fefault add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                        <br />

                    </form>
                    <a href="{{url('cart')}}"><button class="btn btn-fefault">Go to Cart</button></a>
                </div>
            </div>
        </div>
    @endforeach
    </div>



@endsection
