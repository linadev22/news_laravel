@extends('admin.layout');
@section('page')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- [ Main Content ] start -->
<div class="row">

    <!--Category start -->
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Edit Post Form</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Add this line to specify the method as POST -->
                        <div class="row">
                            <div class="col ml-2 mt-2">
                                <label class="form-label">Category</label>
                                <select id="category" name="category_id" class="form-control" aria-label="Default select example">
                                    <option selected>--Select Category--</option>
                                    @foreach ($main_categories as $itemz)
                                    <option value="{{$itemz->id}}" {{$post->category_id==$itemz->id?"selected":""}}>{{$itemz->name_kh}}|{{$itemz->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mr-2 mt-2">
                                <label class="form-label">Sub Category</label>
                                <select name="sub_category_id" id="subcategory" class="form-control" aria-label="Default select example">
                                    <option selected>--Select Category--</option>
                                    @foreach ($sub_categories as $itemz)
                                    <option value="{{$itemz->id}}" {{$post->sub_category_id==$itemz->id?"selected":""}}>{{$itemz->name_kh}}|{{$itemz->name_en}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ml-2 mt-2">
                                <label for="tittle_kh" class="form-label">Tittle Khmer</label>
                                <input type="text" value="{{$post->title_kh}}" name="tittle_kh" class="form-control" aria-label="First name">
                            </div>
                            <div class="col mr-2 mt-2">
                                <label for="tittle_en" class="form-label">Tittle English</label>
                                <input type="text" name="tittle_en" value="{{$post->title_en}}" class="form-control" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ml-2 mt-2">
                                <label for="namekh" class="form-label">Details Khmer</label>
                                <!-- <input type="text" name="name_kh" class="form-control" id="namekh" placeholder=""> -->
                                <textarea class="form-control" name="detail_kh" placeholder="Leave a comment here" id="editor_kh" style="height: 100px">{{$post->detail_kh}}</textarea>
                                @error('name_kh')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mr-2 mt-2 mb-4">
                                <label for="nameen" class="form-label">Details English</label>
                                <!-- <input type="text" name="name_en" class="form-control" id="nameen" placeholder=""> -->
                                <textarea class="form-control" name="detail_en" placeholder="Leave a comment here" id="editor_en" style="height: 100px">{{$post->detail_en}}</textarea>
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ml-2">
                                <label for="tittle_kh" class="form-label">Image</label>
                                <input name="image" class="form-control form-control-sm" id="image" type="file">
                            </div>
                            <div class="col mr-2 mt-2">
                                <!-- <label for="tittle_en" class="form-label">Tittle Khmer</label> -->
                                <img id="show_image" src="{{asset($post->image)}}" alt="" style="height: 150px;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary ml-2">Update</button> <!-- Changed button text to 'Update' -->
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- category end -->
<!-- main content end -->
@endsection
@section('Scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor_kh'))
        // .create(document.querySelector('#editor_en'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor

        .create(document.querySelector('#editor_en'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection