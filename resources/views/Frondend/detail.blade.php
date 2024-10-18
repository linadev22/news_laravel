@extends('Frondend.layout')
@section('layout')
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <div class="sn-img mb-4">
                        <img src="{{ asset($post->image) }}" style="width: 713px; height: 354px;" />
                    </div>

                    <div class="sn-content">
                        <h3 style="line-height: 1.5;" class="sn-title">
                            @if (session()->get('language')=='khmer')
                            {{$post->title_kh}}
                            @else
                            {{$post->title_en}}
                            @endif
                        </h3>
                        <h6 style="line-height: 1.8; text-align: justify;">
                            @if (session()->get('language')=='khmer')
                            {!! $post->detail_kh !!}
                            @else
                            {!! $post->detail_en !!}
                            @endif
                        </h6>


                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        ពេញនិយម
                        @else
                        Most Popular
                        @endif
                    </div>
                </div>
                <div class="row pb-3">
                    @foreach ($popular as $item )
                    <div class="col-5 align-self-center">
                        <a href="{{route('detail',$item->id)}}" title="Title">
                            <img src="{{ asset($item->image) }}" alt="img" class="fh5co_most_trading" />
                        </a>
                    </div>

                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">
                            @if (session()->get('language')=='khmer')
                            {{$item->title_kh}}
                            @else
                            {{$item->title_en}}
                            @endif
                        </div>
                        <div class="most_fh5co_treding_font_123"> {{$item->created_at->diffforhumans()}}</div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                @if (session()->get('language')=='khmer')
                កំពុងល្បី
                @else
                Trending
                @endif
            </div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            @foreach ($trending as $item )
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="{{asset($item->image)}}" alt="" class="fh5co_img_special_relative" /></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="{{route('detail',$item->id)}}" class="text-white">
                            @if (session()->get('language')=='khmer')
                            {{$item->title_kh}}
                            @else
                            {{$item->title_en}}
                            @endif
                        </a>
                        <div class="fh5co_latest_trading_date_and_name_color">{{$item->User->name}} - {{$item->created_at->diffforhumans()}}</div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>



@endsection