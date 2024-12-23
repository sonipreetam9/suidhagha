@include('admin.header');
@php
$i=0;
@endphp

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Home Middle Banner</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.middle.banner') }}">Home Middle
                                            Banner</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Homepage Middle Banner</h5>
                                    </div>
                                    <div class="card-block table-border-style">


                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.insert.middlebanner') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="ci">Select Category</label>
                                                        <select name="category_id" id="ci" class="form-control" required>
                                                            <option value="0">Select Category</option>
                                                            @foreach ($categories as $cate)
                                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Discount</label>
                                                        <input class="form-control" type="number" name="discount">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input class="form-control" type="text" name="title">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Sub-Title</label>
                                                        <input class="form-control" type="text" name="sub_title">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="input1" class="form-label">Banner Image</label>
                                                        <input type="file" class="form-control" name="image" id="input1">
                                                        @if ($errors->has('image'))
                                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Sections</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">

                                            @if (session('danger'))
                                            <div class="alert alert-danger">
                                                {{ session('danger') }}

                                            </div>
                                            @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Discount</th>
                                                        <th>Title</th>
                                                        <th>Sub-Title</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lists as $list )
                                                    @php
                                                    $i++;
                                                    @endphp

                                                    <tr>
                                                        <td>
                                                            {{ $i }}
                                                        </td>
                                                        <td>
                                                            {{ $list->discount }}%
                                                        </td>
                                                        <td>
                                                            {{ $list->title }}
                                                        </td>
                                                        <td>
                                                            {{ $list->sub_title }}
                                                        </td>

                                                        <td>
                                                            <div class="user-icon">

                                                                <img src="{{ asset('uploads/Middle Banner/'.$list->image) }}" style="height: 50px; width: 50px;">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal{{ $list->id }}">Update</button>
                                                            <div id="gridSystemModal{{ $list->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="gridModalLabel">
                                                                                {{ $list->title }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.middle.banner', ['id' => $list->id]) }}">
                                                                                @csrf
                                                                                @method('POST')
                                                                                <input type="hidden" value="id" name="id">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="ci">Select Category</label>
                                                                                            <select name="category_id" id="ci" class="form-control" required>
                                                                                                @if($list->category_id)
                                                                                                <option selected value="{{ $list->category_id }}">{{ $list->category->name }}</option>
                                                                                                @else
                                                                                                <option selected value="0">Select Category</option>

                                                                                                @endif
                                                                                                @foreach ($categories as $cate)
                                                                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Discount</label>
                                                                                            <input type="number" class="form-control" name="discount" value="{{ $list->discount }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Title</label>
                                                                                            <input type="text" class="form-control" name="title" value="{{ $list->title }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Sub Title</label>
                                                                                            <input type="text" class="form-control" name="sub_title" value="{{ $list->sub_title }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-8 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Image</label>
                                                                                            <input class="form-control" type="file" name="new_image">
                                                                                            @if ($errors->has('image'))
                                                                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                                                                            @endif
                                                                                            <input class="form-control" type="hidden" name="image" value="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <img src="{{ asset('uploads/Middle Banner/'.$list->image) }}" style="width: 100px; height: 100px;">

                                                                                            <br>
                                                                                            <span class="text-primary" style="margin-left: 12px">Old Image</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <input type="submit" class="btn btn-success" name="update" value="Update">
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <form method="post" action="{{ route('adm.del.middle.banner', ['id' => $list->id]) }}" onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger mt-1 ">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
