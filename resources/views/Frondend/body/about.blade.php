<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="{{asset('Frond/images/white_logo.png')}}" alt="img" class="footer_logo" /></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3">
                    @if (session()->get('language')=='khmer')
                    អំពីវេបសាយ
                    @else
                    About Website
                    @endif
                </div>
                <div class="footer_sub_about pb-3">
                    @if (session()->get('language')=='khmer')
                    📰 សូមស្វាគមន៍មកកាន់គេហទំព័រព័ត៌មានរបស់យើង! យើងជាប្រភពរបស់អ្នកសម្រាប់ព័ត៌មានទាន់ពេលវេលា និងគួរឱ្យទុកចិត្តលើប្រធានបទដ៏ធំទូលាយ រួមទាំងព័ត៌មានទាន់ហេតុការណ៍ ព្រឹត្តិការណ៍បច្ចុប្បន្ន បច្ចេកវិទ្យា ការកម្សាន្ត របៀបរស់នៅ និងអ្វីៗជាច្រើនទៀត។ រក្សាព័ត៌មាន រក្សាទំនាក់ទំនង និងបន្តធ្វើបច្ចុប្បន្នភាពជាមួយយើង! 🌍

                    @else
                    📰 Welcome to our news website! We are your go-to source for timely and reliable information on a wide range of topics, including breaking news, current events, technology, entertainment, lifestyle, and more. Stay informed, stay connected, and stay up-to-date with us! 🌍
                    @endif
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                        </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3">
                    @if (session()->get('language')=='khmer')
                    ប្រភេទ
                    @else
                    Category
                    @endif</div>
                <ul class="footer_menu">
                    @forelse ($category as $itemz )

                    <li>
                        <a href="{{route('category',$item->id)}}" class=""> <i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            @if (session()->get('language') == 'khmer')
                            {{$itemz->name_kh}}
                            @else
                            {{$itemz->name_en}}
                            @endif
                        </a>
                    </li>
                    @empty

                    @endforelse


                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3">
                    @if (session()->get('language')=='khmer')
                    ព័ត៌មានដែលមានអ្នកមើលច្រើន
                    @else
                    Most Viewed Posts
                    @endif
                </div>
                @forelse ($mostViewed as $item)
                <div class="footer_makes_sub_font">{{$item->created_at->diffforhumans()}}</div>
                <a href="{{route('detail',$item->id)}}" class="footer_post pb-4">
                    @if (session()->get('language')=='khmer')
                    {{$item->title_kh}}
                    @else
                    {{$item->title_en}}
                    @endif
                </a>
                @empty

                @endforelse
                <div class="footer_position_absolute"><img src="{{asset('Frond/images/footer_sub_tipik.png')}}" alt="img" class="width_footer_sub_img" /></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">

                <div class="footer_main_title py-3">
                    @if (session()->get('language')=='khmer')
                    ព័ត៌មានកែប្រែចុងក្រោយ
                    @else
                    Last Modified Posts
                    @endif
                </div>
                @forelse ($lastpost as $item)
                <a href="{{route('detail',$item->id)}}" class="footer_img_post_6"><img src="{{asset($item->image)}}" alt="img" /></a>
                @empty

                @endforelse


            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control fh5co_footer_text_box" placeholder="@if (session()->get('language')=='khmer')
                        បញ្ចូលអ៊ីមែលរបស់អ្នក
                        @else
                        Input your email
                        @endif" aria-describedby="basic-addon1">
                    <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;
                        @if (session()->get('language')=='khmer')
                        ជាវ
                        @else
                        Subscribe
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>