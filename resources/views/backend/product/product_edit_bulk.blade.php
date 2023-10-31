@extends('admin.admin_dashboard')
@section('admin')
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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name </th>
                                    <th>Price </th>
                                    <th>QTY </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td> <input value="{{ $product->product_name }}"
                                                name="products[{{ $product->id }}][product_name]">
                                        </td>
                                        <td> <input value="{{ $product->selling_price }}"
                                                name="products[{{ $product->id }}][selling_price]"></td>
                                        <td> <input value="{{ $product->product_qty }}"
                                                name="products[{{ $product->id }}][product_qty]">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Name </th>
                                    <th>Price </th>
                                    <th>QTY </th>

                                </tr>
                            </tfoot>
                        </table>
                        <button type="submit" class="btn btn-primary px-4">Update Products</button>
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
    @endsection
