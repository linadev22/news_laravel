@extends('Frondend.layout')
@section('layout')
<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img style="cursor: pointer;" src="{{asset($post->image)}}" alt="img" />
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-address-book"></i>&nbsp;&nbsp;

                            @if (session()->get('language')=='khmer')
                            {{$post->category->name_kh}}
                            @else
                            {{$post->category->name_en}}

                            @endif

                        </a></div>
                    <div class="">
                        <a href="{{route('detail',$post->id)}}" class="fh5co_good_font">
                            @if (session()->get('language')=='khmer')
                            {{$post->title_kh}}
                            @else
                            {{$post->title_en}}

                            @endif
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="color_fff">By: {{$post->User->name}}</a>
                    </div>
                    <div class="">
                        <a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$post->created_at->diffforhumans()}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @foreach ($subpost as $item )
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img style="cursor: pointer;" height="200px" width="300px" src="{{asset($item->image)}}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="#" class="color_fff">

                                    @if (session()->get('language')=='khmer')
                                    {{$item->category->name_kh}}
                                    @else
                                    {{$item->category->name_en}}

                                    @endif
                                </a>
                            </div>
                            <div class="">
                                <a href="{{route('detail',$item->id)}}" class="fh5co_good_font_2">
                                    @if (session()->get('language')=='khmer')
                                    {{Str::limit($item->title_kh, 65, '...')}}
                                    @else
                                    {{Str::limit ($item->title_en, 65, '...')}}
                                    @endif
                                </a>
                            </div>
                            <div class="">
                                <a href="#" class="color_fff">By: {{$item->User->name}}</a>
                            </div>
                            <div class="">
                                <a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$item->created_at->diffforhumans()}}</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!-- Start Trending -->
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
<!-- End trending -->

<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                @if (session()->get('language')=='khmer')
                ព័ត៌មាន
                @else
                News
                @endif
            </div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach ($news as $item )
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img style="cursor: pointer;" src="{{asset($item->image)}}" alt="" /></div>
                    <div>
                        <a href="{{route('detail',$item->id)}}" class="d-block fh5co_small_post_heading">
                            <span class="">
                                @if (session()->get('language')=='khmer')
                                {{$item->title_kh}}
                                @else
                                {{$item->title_en}}
                                @endif
                            </span>
                        </a>
                        <div class="c_g"><i class="fa fa-clock-o"></i>{{$item->created_at->diffforhumans()}}</div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>


<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        ព័ត៌មាន
                        @else
                        News
                        @endif
                    </div>
                </div>
                <div class="row pb-4">
                    @foreach ($secondnews as $item )
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div style="cursor: pointer;" class="fh5co_news_img"><img src="{{asset($item->image)}}" alt="" /></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{route('detail',$item->id)}}" class="fh5co_magna py-2">
                            @if (session()->get('language')=='khmer')
                            {{$item->title_kh}}
                            @else
                            {{$item->title_en}}
                            @endif
                        </a>
                        <a href="#" class="fh5co_mini_time py-3">
                            {{$item->User->name}} - {{$item->created_at->diffforhumans()}}
                        </a>
                        <div class="fh5co_consectetur">
                            @if (session()->get('language')=='khmer')
                            {{Str::limit($item->detail_kh, 200, '...')}}
                            @else
                            {{Str::limit ($item->detail_en, 200, '...')}}
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <!-- Most Popular and Tag Start -->
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        @if (session()->get('language')=='khmer')
                        ថេក
                        @else
                        Tags
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">

                    @forelse ($category as $itemz )
                    <a href="{{route('category',$item->id)}}" class="fh5co_tagg">
                        @if (session()->get('language') == 'khmer')
                        {{$itemz->name_kh}}
                        @else
                        {{$itemz->name_en}}
                        @endif
                    </a>
                    @empty

                    @endforelse

                </div>
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
            <!-- Most Popular and Tag end -->
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
</div>
<!-- <script>
    // Get current date and time
    var now = new Date();
    var datetime = now.toLocaleString();

    // Insert date and time into HTML
    document.getElementById("datetime").innerHTML = datetime;
</script> -->

@endsection