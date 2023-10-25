@extends('admin.admin_dashboard')
@section('admin')
    <div class="card-body">
        <div class="card">
            <div class="flex justify-center items-center m-2 p-2">
                <form action="{{ route('product.import.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mx-5 flex flex-col items-center"> <!-- Center the items vertically and horizontally -->
                        <input type="file" name="product" required class="btn btn-outline-primary">
                        <button type="submit" class="mx-5 btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
