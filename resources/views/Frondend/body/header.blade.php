<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <!-- <div id="datetime" class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i class="fa fa-clock-o"></i></a> -->
            <div style="scroll-behavior: smooth;" class="d-inline-block fh5co_trading_posotion_relative"><a href="#trending" class="treding_btn">
                    @if (session()->get('language')=='khmer')
                    កំពុងល្បី
                    @else
                    Trending
                    @endif
                </a>

                <div class="fh5co_treding_position_absolute"></div>
            </div>
            <!-- <a href="#" class="color_fff fh5co_mediya_setting">Instagram’s big redesign goes live with black-and-white app</a> -->
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="{{asset('Frond/images/logo.png')}}" alt="img" class="fh5co_logo_width" />
            </div>

            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <!-- <div class="text-center d-inline-block">
                    <a class="fh5co_display_table" onclick="toggleSearch()">
                        <div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div>
                    </a>
                </div> -->
                <div id="searchBox" class="search-box ">
                    <form method="GET" action="{{ route('search') }}">
                        <input class="btn btn-info" placeholder="search" type="text" name="search">
                        <button class="btn btn-primary" type="submit" style="cursor: pointer;">
                            @if (session()->get('language')=='khmer')
                            ស្វែងរក
                            @else
                            Search
                            @endif
                        </button>
                    </form>
                </div>

                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://t.me/Linaa_2212" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-telegram"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://www.facebook.com/share/x9DbLH6fmjFCt4Zf/?mibextid=qi2Omg" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width" /></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">
                            <h6 style="font-weight: bold;">
                                @if (session()->get('language')=='khmer')
                                ទំព័រដើម
                                @else
                                Home
                                @endif<span class="sr-only">(current)</span>
                            </h6>
                        </a>
                    </li>


                    @forelse ($category as $item )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> @if (session()->get('language')=='khmer')
                            <h5>
                                {{$item->name_kh}}
                                @else
                                {{$item->name_en}}

                                @endif <span class="sr-only">(current)</span>
                            </h5>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            @forelse ($item->Subcategory as $itemz )
                            <a class="dropdown-item" href="{{route('category',$item->id)}}">
                                @if (session()->get('language') == 'khmer')
                                {{$itemz->name_kh}}
                                @else
                                {{$itemz->name_en}}
                                @endif</a>
                            @empty

                            @endforelse


                        </div>
                    </li>
                    @empty

                    @endforelse
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('khmer')}}">
                            @if (session()->get('language')=='khmer')
                            ភាសាខ្មែរ
                            @else
                            Khmer
                            @endif
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('english')}}">
                            @if (session()->get('language')=='khmer')
                            អង់គ្លេស
                            @else
                            English
                            @endif
                        </a>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
</div>