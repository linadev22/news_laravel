<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved">
                @if (session()->get('language') == 'khmer')
                រៀបរៀងនិងកែសម្រួលដោយកញ្ញា <span style="font-weight: bold; color: yellow;">លីណា</span>
                បង្រៀនដោយ៖ សាស្ត្រាចារ្យ <span style="font-weight: bold; color: yellow;">លី សីហា</span>
                @else
                Prepared and edited by Miss <span style="font-weight: bold; color: yellow;">Lina</span>
                Lecture by Professor: <span style="font-weight: bold; color: yellow;">Ly Seyha</span>
                @endif
                . </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                @forelse ($category as $item )
                <a href="{{route('category',$item->id)}}" class="footer_last_part_menu">
                    @if (session()->get('language') == 'khmer')
                    {{$item->name_kh}}
                    @else
                    {{$item->name_en}}
                    @endif
                </a>
                @empty

                @endforelse
                <!-- <a href="Contact_us.html" class="footer_last_part_menu">About</a>
                <a href="Contact_us.html" class="footer_last_part_menu">Contact</a>
                <a href="blog.html" class="footer_last_part_menu">Latest News</a> -->
            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>