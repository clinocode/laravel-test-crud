@extends('layout.app')
@section('body')
    <h1 class="mb-4 mt-2">
        Detail Product</h1>
    <form class='form' action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-control" name="category_id" id="kategori">
                <option selected value="{{ $product->category_id }}">
                    @if ($product->category_id == 1)
                        Beli Ac (default)
                    @elseif ($product->category_id == 2)
                        Jual Ac (default)
                    @else
                        Tukar Ac (default)
                    @endif
                </option>
                <option value="1">Beli Ac</option>
                <option value="2">Jual Ac</option>
                <option value="3">Tukar Ac</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="merkac" class="form-label">Merk AC</label>
            <select class="form-select form-control" name="brand_id" id="merkac">
                <option selected value="{{ $product->brand_id }}">
                    @if ($product->brand_id == 1)
                        Polytron (default)
                    @else
                        Sharp (default)
                    @endif
                </option>
                <option value="1">Polytron</option>
                <option value="2">Sharp</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="kategori" name="name" value="{{ $product->name }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control" id="kategori" name="description">{{ $product->description }} </textarea>

        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="price" value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label for="disc" class="form-label">Discount (%)</label>
            <input type="number" class="form-control" id="disc" name="discount" value="{{ $product->discount }}">
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select form-control" name="condition" id="kondisi">
                <option selected value="{{ $product->condition }}">
                    @if ($product->condition == 1)
                        Baru (default)
                    @else
                        Bekas (default)
                    @endif
                </option>
                <option value="1">Baru</option>
                <option value="2">Bekas</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <select class="form-select form-control" name="uom_id" id="unit">

                <option selected value="{{ $product->uom_id }}">
                    @if ($product->uom_id == 1)
                        kg (default)
                    @else
                        gram (default)
                    @endif
                </option>

                <option value="1">kg</option>
                <option value="2">gram</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select class="form-select form-control" name="is_active" id="active">

                <option selected value="{{ $product->is_active }}">
                    @if ($product->is_active == 1)
                        Aktif (default)
                    @else
                        Tidak Aktif (default)
                    @endif
                </option>
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="image" name="default_image">

        </div>

        <button type="submit" class="btn btn-primary mb-4">Submit</button>
    </form>
@endsection
