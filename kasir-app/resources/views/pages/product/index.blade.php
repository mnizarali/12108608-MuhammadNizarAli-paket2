@extends('layout.dashboard')
@section('title', 'Stock')
@section('content')

    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <b>Success:</b>

        </div>
    </div>


    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <b>Fail:</b>

        </div>
    </div>


    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <b>Error:</b>

        </div>
    </div>
<div class="p-2">
    <h4>Dashboard</h4>
    <h6 class="font-weight-light">Dashboard / Stock / <span class="font-weight-bold"> Stock Management </span></h6>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Stok</h4>
                <div class="card-header-form">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                data-target="#addStockModal"><i class="fas fa-plus"></i> Tambah Produk Baru</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Unit</th>
                            <th>Kode</th>
                            <th>Aksi</th>
                        </tr>

                        <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" type="button" data-toggle="modal"
                                        data-target="#editStockModal">Tambah Unit</button>
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#editProdukModal">Edit Produk</button>
                                </td>
                            </tr>

                            <div class="modal fade" tabindex="-1" role="dialog"
                                id="editStockModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Unit</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action=""
                                            class="needs-validation" novalidate="">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="d-block">
                                                        <label for="stock" class="control-label">Masukan Unit<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                    <input id="stock" class="form-control" name=""
                                                        tabindex="2" type="number" required>
                                                    <div class="invalid-feedback">
                                                        please fill in unit product
                                                    </div>
                                                    <small><b></b>Isi dengan teliti</small>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-block">
                                                        <label for="status" class="control-label">Status<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" selected></option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" tabindex="-1" role="dialog"
                                id="editProdukModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action=""
                                            class="needs-validation" novalidate="">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="product_name">Nama Produk<span
                                                            class="text-danger">*</span></label>
                                                    <input id="product_name" class="form-control" name=""
                                                        tabindex="1" value=""
                                                        type="text" required autofocus>
                                                    <div class="invalid-feedback">
                                                        Silahkah isi nama produk
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="d-block">
                                                        <label for="price" class="control-label">Harga<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                    <input id="price" class="form-control" name=""
                                                        tabindex="2" value="" type="number"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Silahkan isi nama produk
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group">
                                                    <div class="d-block">
                                                        <label for="stock" class="control-label">Stock</label>
                                                    </div>
                                                    <input id="stock" class="form-control" name="stok" tabindex="2" type="number"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        please fill in product stock
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <tr>
                                <td colspan="4" class="text-center">Belum ada data</td>
                            </tr>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addStockModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('dashboard.user.create') }}" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_name">Nama Produk<span class="text-danger">*</span></label>
                        <input id="product_name" class="form-control" name="" tabindex="1"
                            type="text" required autofocus>
                        <div class="invalid-feedback">
                            Silahkan isi nama produk
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="price" class="control-label">Harga<span
                                    class="text-danger">*</span></label>
                        </div>
                        <input id="price" class="form-control" name="harga" tabindex="2" type="number"
                            required>
                        <div class="invalid-feedback">
                            Silahkan isi harga produk
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="stock" class="control-label">Unit<span
                                    class="text-danger">*</span></label>
                        </div>
                        <input id="stock" class="form-control" name="stock" tabindex="2" type="number"
                            required>
                        <div class="invalid-feedback">
                            Silahkan isi berapa unit produk
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="stock" class="control-label">Unit<span
                                    class="text-danger">*</span></label>
                        </div>
                        <input id="stock" class="form-control" name="img" tabindex="2" type="file"
                        enctype="multipart/form-data" required>
                        <div class="invalid-feedback">
                            Silahkan isi berapa unit produk
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
