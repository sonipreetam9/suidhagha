@include('admin.header')

<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }

</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Add Category</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="#">Add Sub Category</a></li>
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
                                        <h5>Add New Sub Category</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif

                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.add.sub.category') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label id="cate">Select Category</label>
                                                    <select name="category_id" id="" class="form-control" id="cate" required>
                                                        <option value="0" selected>Select Category</option>
                                                        @foreach ($cates as $cat )
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('category_id'))
                                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Sub Category Name</label>
                                                    <input class="form-control" type="text" name="name" required>
                                                    @if ($errors->has('name'))
                                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Logo</label>
                                                    <input class="form-control" type="file" name="image" required accept=".jpg,.jpeg,.webp,.png">
                                                    @if ($errors->has('image'))
                                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary btn-lg" type="submit" name="btnsave">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
