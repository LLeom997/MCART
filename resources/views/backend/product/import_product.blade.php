@extends('admin.admin_dashboard')
@section('admin')
    <div class="container flex justify-between m-2 p-2">
        <form action="{{ route('product.import.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="users" required>
            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-blue-500 text-white rounded-md">Upload</button>
        </form>
    </div>
@endsection
