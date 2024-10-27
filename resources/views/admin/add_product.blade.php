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
                                    <h5 class="m-b-10">Add Product</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.add.product.page') }}p">Add
                                            Product</a></li>
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
                                        <h5>Add new Product</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-success">
                                            {{ session('error') }}
                                        </div>
                                        @endif




                                        <form method="post" enctype="multipart/form-data"
                                            action="{{ route('adm.add.product') }}">
                                            {{-- <form method="get" enctype="multipart/form-data"
                                                action="{{ route('test.req') }}"> --}}
                                                @csrf
                                                @method('POST')
                                                <div class="row">
                                                    <!-- Category ID Field -->
                                                    <div class="col-md-4">
                                                        <label for="category_id">Category ID</label>
                                                        <select name="category_id" class="form-control" id="category_id"
                                                            required>
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('category_id'))
                                                        <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                                        @endif
                                                    </div>

                                                    <!-- Subcategory ID Field -->
                                                    <div class="col-md-4">
                                                        <label for="sub_category_id">Subcategory ID</label>
                                                        <select name="sub_category_id" class="form-control"
                                                            id="sub_category_id" required>
                                                            <option value="">Select Subcategory</option>
                                                        </select>
                                                        @if ($errors->has('sub_category_id'))
                                                        <p class="text-danger">{{ $errors->first('sub_category_id') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Select Brand</label>
                                                        <select name="brand_id" class="form-control form-select"
                                                            required>
                                                            <option value="0">Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Product Name</label>
                                                        <input class="form-control" type="text" name="product_name"
                                                            required>
                                                        @if ($errors->has('product_name'))
                                                        <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Photo 1</label>
                                                        <input class="form-control" type="file" name="product_image"
                                                            required>
                                                        @if ($errors->has('product_image'))
                                                        <p class="text-danger">{{ $errors->first('product_image') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label>Photo 2</label>
                                                        <input class="form-control" type="file" name="product_image_2">
                                                        @if ($errors->has('product_image_2'))
                                                        <p class="text-danger">{{ $errors->first('product_image_2') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Photo 3</label>
                                                        <input class="form-control" type="file" name="product_image_3">
                                                        @if ($errors->has('product_image_3'))
                                                        <p class="text-danger">{{ $errors->first('product_image_3') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Photo 4</label>
                                                        <input class="form-control" type="file" name="product_image_4">
                                                        @if ($errors->has('product_image_4'))
                                                        <p class="text-danger">{{ $errors->first('product_image_4') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Photo 5</label>
                                                        <input class="form-control" type="file" name="product_image_5">
                                                        @if ($errors->has('product_image_5'))
                                                        <p class="text-danger">{{ $errors->first('product_image_5') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    {{-- <div class="col-md-3">
                                                        <label>Product model</label>
                                                        <input class="form-control" type="text" name="model" required>
                                                        @if ($errors->has('model'))
                                                        <p class="text-danger">{{ $errors->first('model') }}</p>
                                                        @endif
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <label>Colors</label>
                                                        <input class="form-control" type="text" name="color" required
                                                            value="White">
                                                        @if ($errors->has('color'))
                                                        <p class="text-danger">{{ $errors->first('color') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Price</label>
                                                        <input class="form-control" type="number" name="price" required>
                                                        @if ($errors->has('price'))
                                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Discounted Price</label>
                                                        <input class="form-control" type="number"
                                                            name="discounted_price" required>
                                                        @if ($errors->has('discounted_price'))
                                                        <p class="text-danger">{{ $errors->first('discounted_price') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="col-md-5 m-2 p-2 border  d-flex justify-content-around align-items-center text-center">
                                                        Size Available
                                                        @php
                                                        $j = 38;
                                                        @endphp
                                                        @for (; $j <= 48; $j +=2) <label for="check{{ $j }}">{{ $j
                                                            }}</label>
                                                            <input id="check{{ $j }}" type="checkbox" name="size[]"
                                                                value="{{ $j }}" style="width: 20px; height: 20px;">
                                                            @endfor

                                                    </div>





                                                    <div class="col-md-12">
                                                        <label>About1</label>
                                                        <textarea class="form-control" name="about1"
                                                            rows="5"></textarea>
                                                        @if ($errors->has('about1'))
                                                        <p class="text-danger">{{ $errors->first('about1') }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary btn-lg" type="submit"
                                                            name="btnsave">Submit</button>
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


<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();

            if (categoryId) {
                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // This shows {subcategories: Array(6)} in the console

                        // Access the subcategories array from the response
                        var subcategories = response.subcategories;

                        // Clear the previous options
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Select Subcategory</option>');

                        // If subcategories exist, append them
                        if(subcategories.length > 0) {
                            $.each(subcategories, function(index, subcategory) {
                                $('#sub_category_id').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        } else {
                            $('#sub_category_id').append('<option value="0">No subcategories available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ', error);
                    }
                });
            } else {
                // If no category is selected, reset the subcategory dropdown
                $('#sub_category_id').empty();
                $('#sub_category_id').append('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>


@include('admin.footer')
