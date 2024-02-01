@extends('layout.app')
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mt-4">Product</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary"> Create</a>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-primary">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>

        <hr />

        <tbody>
            @foreach ($product as $pro)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset($pro->default_image) }}" style="width:70px; height:70px;"></td>
                    <td>{{ $pro->name }}</td>
                    <td>
                        @if ($pro->category_id == 1)
                            Beli Ac
                        @elseif ($pro->category_id == 2)
                            Jual Ac
                        @else
                            Tukar Ac
                        @endif
                    </td>
                    <td>{{ $pro->price }}</td>
                    <td>{{ $pro->stock }}
                        @if ($pro->uom_id == 1)
                            kg
                        @else
                            gram
                        @endif
                    </td>
                    <td>
                        @if ($pro->is_active == 1)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                    <td>{{ $pro->created_at }}</td>
                    <td><a href="{{ route('product.edit', $pro->id) }}" type="button" class="btn btn-warning">Edit</a>
                        <a href="{{ route('product.show', $pro->id) }}" type="button" class="btn btn-success">Show</a>
                        <form class="p-0" action="{{ route('product.destroy', $pro->id) }}" method="POST"
                            onsubmit="return confirm('Apakah yakin akan dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
