@extends('layout.app')
@section('body')
    <h1 class="mb-4 mt-2">Tambah Product</h1>
    <form class='form' action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-control" name="category_id" id="kategori">
                <option selected value="1">Beli Ac</option>
                <option value="2">Jual Ac</option>
                <option value="3">Tukar Ac</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="merkac" class="form-label">Merk AC</label>
            <select class="form-select form-control" name="brand_id" id="merkac">
                <option selected value="1">Polytron</option>
                <option value="2">Sharp</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="kategori" name="name">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control" id="kategori" name="description"> </textarea>

        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="price">
        </div>

        <div class="mb-3">
            <label for="disc" class="form-label">Discount(%)</label>
            <input type="number" class="form-control" id="disc" name="discount">
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select form-control" name="condition" id="kondisi">
                <option selected value="1">Baru</option>
                <option value="2">Bekas</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <select class="form-select form-control" name="uom_id" id="unit">
                <option selected value="1">kg</option>
                <option value="2">gram</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select class="form-select form-control" name="is_active" id="active">
                <option value="1">Aktif</option>
                <option selected value="2">Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="image" name="default_image">
            <span>file yang dapat diterima : png, jpg, jpeg, svg</span>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Submit</button>
    </form>
@endsection
