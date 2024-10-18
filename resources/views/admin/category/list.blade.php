@extends('admin.layout');
@section('page')
<!-- [ Main Content ] start -->
<div class="row">

    <!--Category start -->
    <div class="col-xl-8 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Category List</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
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
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>N0</th>
                                <th>Name</th>
                                <th>Created by</th>
                                <th>Created Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name_kh }}|{{ $item->name_en }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at->diffforhumans() }}</td>
                                <td>


                                    <!-- Button trigger modal -->
                                    <button type="submit" {{Auth::user()->role=='user'?'disabled':''}} class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit and Update</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('update',$item->id) }}">
                                                        @csrf
                                                        @method('POST') <!-- Add this line to specify the method as POST -->
                                                        <div class="mb-3">
                                                            <label for="namekh" class="form-label">Category Khmer</label>
                                                            <input type="text" value="{{ $item->name_kh }}" name="name_kh" class="form-control" id="namekh" placeholder="">
                                                            @error('name_kh')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nameen" class="form-label">Category English</label>
                                                            <input type="text" value="{{ $item->name_en }}" name="name_en" class="form-control" id="nameen" placeholder="">
                                                            @error('name_en')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button> <!-- Changed button text to 'Update' -->
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button> -->
                                    <a href="{{ route('delete',$item->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$category->links("pagination::bootstrap-5")}}
                    <!-- <div class="">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>Form Insert Category</h5>

            </div>
            <div class="card-body">
                <form method="post" action="{{route('store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="namekh" class="form-label">Category Khmer</label>
                        <input type="text" name="name_kh" class="form-control" id="namekh" placeholder="">
                        @error('name_kh')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nameen" class="form-label">Category English</label>
                        <input type="text" name="name_en" class="form-control" id="nameen" placeholder="">
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- category end -->
<!-- main content end -->
@endsection