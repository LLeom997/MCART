@extends('admin.admin_dashboard')
@section('admin')
    <style>
        /* Increase the size of the checkmark in normal state */
        input[type="checkbox"] {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            /* Adjust the width as needed */
            height: 25px;
            /* Adjust the height as needed */
            border: 2px solid #ccc;
            /* Border style for the checkbox */
            border-radius: 3px;
            /* Rounded corners */
            outline: none;
            /* Remove the focus outline */
        }

        /* Increase the size of the checkmark when checked */
        input[type="checkbox"]:checked {
            background-color: #007bff;
            /* Change the background color when checked */
        }

        /* Styling for the checkmark (pseudo-element) */
        input[type="checkbox"]::before {
            content: "\2714";
            /* Unicode checkmark symbol */
            font-size: 20px;
            /* Adjust the font size as needed */
            color: white;
            /* Color of the checkmark */
            text-align: center;
            line-height: 25px;
            /* Adjust the line height for centering */
            position: relative;
            top: -3px;
            /* Adjust the vertical position of the checkmark */
            left: 3px;
            /* Adjust the horizontal position of the checkmark */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Product <span
                                class="badge rounded-pill bg-danger"> {{ count($products) }} </span> </li>
                    </ol>
                </nav>
            </div>
        </div>


        <!--end breadcrumb-->

        <hr />
        <form method="POST" action="{{ route('product.update.bulk') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4" name="action" value="update">Update
                                Selected
                                Products</button>
                            <button type="submit" class="btn btn-danger px-4" name="action" value="delete">Delete Selected
                                Products</button>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> <input type="checkbox" id="select-all"></th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product Name </th>
                                    <th>Price </th>
                                    <th>Discount Price</th>
                                    <th>QTY </th>
                                    <th>Status </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="selectedProducts[]" value="{{ $product->id }}">
                                        </td>
                                        <td><input value="{{ $product->id }}" name="products[{{ $product->id }}][id]"
                                                disabled style="width: 30px">
                                        </td>
                                        <td>
                                            <img src="{{ !empty($product->product_thambnail) ? url('upload/products/thambnail/' . $product->product_thambnail) : url('upload/no_image.jpg') }}"
                                                alt="Admin" style="width: 100px; height: 100px;">
                                        </td>
                                        <td> <input value="{{ $product->product_name }}"
                                                name="products[{{ $product->id }}][product_name]">
                                        </td>
                                        <td> <input value="{{ $product->selling_price }}"
                                                name="products[{{ $product->id }}][selling_price]"></td>
                                        <td> <input value="{{ $product->discount_price }}"
                                                name="products[{{ $product->id }}][discount_price]">
                                        </td>
                                        <td> <input value="{{ $product->product_qty }}"
                                                name="products[{{ $product->id }}][product_qty]">
                                        </td>
                                        <td> <input value="{{ $product->status }}"
                                                name="products[{{ $product->id }}][status]" style="width: 50px">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> <input type="checkbox" id="select-all"></th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product Name </th>
                                    <th>Price </th>
                                    <th>Discount Price</th>
                                    <th>QTY </th>
                                    <th>Status </th>

                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4" name="action" value="update">Update
                                Selected
                                Products</button>
                            <button type="submit" class="btn btn-danger px-4" name="action" value="delete">Delete Selected
                                Products</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#select-all').change(function() {
                    $('input[name="selectedProducts[]"]').prop('checked', this.checked);
                });
            });
        </script>
    @endsection
