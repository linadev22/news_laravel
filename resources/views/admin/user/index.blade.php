@extends('admin.layout')
@section('page')

<div class="row">
    <div class=" col-md-4 mb-2 float-end ">
        <a href="{{route('user.form')}}" class="btn btn-primary btn-sm"><i class="feather icon-plus"></i>Insert User</a>

    </div>
    <!-- [ Main Content ] start -->
    <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>User List</h5>
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
                                    <th>Email</th>
                                    <!-- <th>Role</th> -->
                                    <th>Created at </th>
                                    <!-- <th>Image</th> -->
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email}}</td>
                                    <!-- <td>{{ $item->Role }}</td> -->
                                    <td>{{ $item->created_at->diffforhumans() }}</td>
                                    <!-- <td>
                                        <img src="{{asset($item->image)}}" class="rounded" height="50px" alt="">
                                    </td> -->
                                    <td>
                                        <a href="{{route('user.edit', $item->id)}}" class="btn btn-success  btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('user.delete', $item->id)}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    @endforeach
                            </tbody>



                        </table>
                    </div>
                </div>
            </div>
        </div>




        @endsection