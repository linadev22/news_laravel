@extends('Frondend.layout')
@section('layout')

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                @forelse ($post as $item)
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        {{$item->category->name_kh}}
                        @else
                        {{$item->category->name_en}}
                        @endif
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img style="cursor: pointer;" src="{{asset($item->image)}}" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{route('detail',$item->id)}}" class="fh5co_magna py-2">
                            @if (session()->get('language')=='khmer')
                            {{Str::limit($item->title_kh, 200, '...')}}
                            @else
                            {{Str::limit ($item->title_en, 200, '...')}}
                            @endif
                        </a>
                        <a href="#" class="fh5co_mini_time py-3">{{$item->User->name}} - {{$item->created_at->diffforhumans()}}</a>
                        <div class="fh5co_consectetur">
                            @if (session()->get('language')=='khmer')
                            {!! Str::limit($item->detail_kh, 200, '...') !!}
                            @else
                            {!! Str::limit ($item->detail_en, 200, '...') !!}
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <center>
                    <h5>No Data</h5>
                </center>
                @endforelse
            </div>

            <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        ថេក
                        @else
                        Tags
                        @endif
                    </div>
                    <div class="fh5co_tags_all">
                        @forelse ($category as $itemz )
                        <a href="{{route('category',$itemz->id)}}" class="fh5co_tagg">
                            @if (session()->get('language') == 'khmer')
                            {{$itemz->name_kh}}
                            @else
                            {{$itemz->name_en}}
                            @endif
                        </a>
                        @empty

                        @endforelse
                        <!-- <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Entertainment</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Business</a> -->
                    </div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        ពេញនិយម
                        @else
                        Most Popular
                        @endif
                    </div>
                </div>

                @forelse ($popular as $item)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <a href="{{route('detail',$item->id)}}" title="Title">
                            <img src="{{ asset($item->image) }}" alt="img" class="fh5co_most_trading" />
                        </a>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">
                            @if (session()->get('language')=='khmer')
                            {{Str::limit($item->title_kh, 50, '...')}}
                            @else
                            {{Str::limit($item->title_en, 50, '...')}}
                            @endif
                        </div>
                        <div class="most_fh5co_treding_font_123">{{$item->created_at->diffforhumans()}}</div>
                    </div>
                </div>
                @empty
                <center>
                    <h4>No Data</h4>
                </center>
                @endforelse
            </div>


        </div>
    </div>
    <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
        <div class="col-12 text-center pb-4 pt-4">
            @if (session()->get('language')=='khmer')
            <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; ពីមុន</a>
            <a href="{{route('category',$item->id)}}" class="btn_pagging">១</a>
            <a href="{{route('detail',$item->id)}}" class="btn_pagging">២</a>
            <a href="{{route('detail',$item->id)}}" class="btn_pagging">៣</a>
            <a href="#" class="btn_pagging">...</a>
            <a href="#" class="btn_mange_pagging">បន្ទាប់ <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
            @else
            <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
            <a href="{{route('category',$item->id)}}" class="btn_pagging">1</a>
            <a href="{{route('detail',$item->id)}}" class="btn_pagging">2</a>
            <a href="{{route('detail',$item->id)}}" class="btn_pagging">3</a>
            <a href="#" class="btn_pagging">...</a>
            <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
            @endif
        </div>
    </div>
</div>


<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>

            <div id="trending" class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
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
                    <div class="fh5co_latest_trading_img"><img style="cursor: pointer;" src="{{asset($item->image)}}" alt="" class="fh5co_img_special_relative" /></div>
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