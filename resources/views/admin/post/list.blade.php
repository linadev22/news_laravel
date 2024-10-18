@extends('admin.layout');
@section('page')
<!-- [ Main Content ] start -->
<div class="row">
    <div class=" col-md-4 mb-2 float-end ">
        <a href="{{route('post.insert.form')}}" class="btn btn-primary btn-sm"><i class="feather icon-plus"></i>Insert Post</a>

    </div>
    <!--Category start -->
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>SubCategory List</h5>
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
                                <th>Category</th>
                                <th>SubCategory</th>
                                <th>Tittle</th>
                                <th>Created by</th>
                                <th>Created Date</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->category ? $item->category->name_kh . '|' . $item->category->name_en : 'N/A' }}</td>
                                <td>{{ $item->subcategory ? $item->subcategory->name_kh . '|' . $item->subcategory->name_en : 'N/A' }}</td>
                                <td>{{Str::limit($item->title_kh,10,'...' ) }}|{{Str::limit($item->title_en,10,'...' ) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at->diffforhumans() }}</td>
                                <td>
                                    <img src="{{asset($item->image)}}" class="rounded" height="50px" alt="">
                                </td>
                                <td>
                                    <a href="{{route('post.edit', $item->id)}}" class="btn btn-success  btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('post.delete',$item->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                @endforeach
                        </tbody>



                    </table>
                    {{$post->links("pagination::bootstrap-5")}}
                </div>
            </div>
        </div>
    </div>


</div>
<!-- category end -->
<!-- main content end -->
@endsection