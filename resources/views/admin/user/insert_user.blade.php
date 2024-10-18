@extends('admin.layout');
@section('page')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- [ Main Content ] start -->
<div class="row">

    <!--Category start -->
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Inser User Form</h5>
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
                    <form method="post" action="{{route('user.add')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Add this line to specify the method as POST -->
                        <div class="row">
                            <div class="col ml-2 mt-2">
                                <label class="form-label">Category</label>
                                <select id="category" name="role" class="form-control" aria-label="Default select example">
                                    <option selected>--Select Category--</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="editor">Editor</option>
                                    <option value="view">View</option>

                                </select>
                            </div>
                            <div class="col mr-2 mt-2">
                                <label class="form-label">Tell</label>
                                <input type="number" name="phone" class="form-control" aria-label="Phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ml-2 mt-2">
                                <label for="tittle_kh" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" aria-label="First name">
                            </div>
                            <div class="col mr-2 mt-2">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" name="email" class="form-control" aria-label="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col ml-2">
                                <label for="tittle_kh" class="form-label">Image</label>
                                <input name="image" class="form-control form-control-sm" id="image" type="file">
                            </div>
                            <div class="col mr-2 mt-2">
                                <!-- <label for="tittle_en" class="form-label">Tittle Khmer</label> -->
                                <img id="show_image" src="{{asset('image.png')}}" alt="" style="height: 150px;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary ml-2">Insert</button> <!-- Changed button text to 'Update' -->
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- category end -->
<!-- main content end -->
@endsection