@extends('admin.layout')
@section('page')



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-2 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Change Password
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.password') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Add this line to specify the method as POST -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="pw" class="form-label">Password</label>
                            <input type="password" name="old_password" class="form-control" aria-label="Last name">
                            @error('old_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="npw" class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" aria-label="Last name">
                            @error('new_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <br>
                        <button type="submit" class="btn btn-primary ml-2 mb-4">Update</button> <!-- Changed button text to 'Update' -->
                        <br>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

<div class="col-xl-12 col-md-12">

    <div class="card table-card">

        <div class="card-header">

            <h3><i class="icon feather icon-user text-c-blue mb-1 d-block"> Profile</i></h3>
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
                <form method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Add this line to specify the method as POST -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col mr-2 mt-2 ml-2">
                                    <!-- <label for="tittle_en" class="form-label">Tittle Khmer</label> -->
                                    <img id="show_image" src="{{asset('image.png')}}" alt="" style="height: 250px;">
                                </div>
                                <div class="col-md-12 ml-2 ">
                                    <label for="tittle_kh" class="form-label">Image</label>
                                    <input name="image" class="form-control form-control-sm" id="image" type="file">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">


                            <div class="col ml-1 mt-2">
                                <label for="tittle_kh" class="form-label">Name</label>
                                <input value="{{Auth::user()->name}}" type="text" name="name" class="form-control" aria-label="First name">
                            </div>
                            <div class="col ml-1 mt-2">
                                <label for="tittle_en" class="form-label">Email</label>
                                <input value="{{Auth::user()->email}}" type="email" name="email" class="form-control" aria-label="Last name">
                            </div>



                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary ml-2 mb-4">Update</button> <!-- Changed button text to 'Update' -->
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection