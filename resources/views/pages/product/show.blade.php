@extends('layout.app')
@section('body')
    <h1 class="mb-4 mt-2">Detail Product</h1>
    <form class='form' action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-control" name="category_id" id="kategori" disabled>
                @if ($product->category_id == 1)
                    <option selected>Beli Ac</option>
                @elseif ($product->category_id == 2)
                    <option selected>Jual Ac</option>
                @else
                    <option selected>Tukar Ac</option>
                @endif

            </select>
        </div>

        <div class="mb-3">
            <label for="merkac" class="form-label">Merk AC</label>
            <select class="form-select form-control" name="brand_id" id="merkac" disabled>
                @if ($product->brand_id == 1)
                    <option selected>Polytron</option>
                @else
                    <option selected>Sharp</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="kategori" name="name" value="{{ $product->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control" id="kategori" name="description" readonly>{{ $product->description }} </textarea>

        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="price" value="{{ $product->price }}" readonly>
        </div>

        <div class="mb-3">
            <label for="disc" class="form-label">Discount (%)</label>
            <input type="number" class="form-control" id="disc" name="discount" value="{{ $product->discount }}"
                readonly>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select form-control" name="condition" id="kondisi" disabled>
                @if ($product->condition == 1)
                    <option selected>Baru</option>
                @else
                    <option selected>Bekas</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" readonly>
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <select class="form-select form-control" name="uom_id" id="unit" disabled>
                @if ($product->uom_id == 1)
                    <option selected>kg</option>
                @else
                    <option selected>gram</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select class="form-select form-control" name="is_active" id="active" disabled>
                @if ($product->is_active == 1)
                    <option selected>Aktif</option>
                @else
                    <option selected>Tidak Aktif</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <img src="{{ asset($product->default_image) }}" id="image" style="width:150px; height:70px;">
        </div>


        <a type="submit" href="{{ route('product.index') }}" class="btn btn-primary mb-4">Kembali</a>
    </form>
@endsection
