@extends('layout.dashboard')
@section('title', 'Invoice')
@section('content')
<div class="p-2"> 
    <h6 class="font-weight-light">Pembelian / <span class="font-weight-bold"> Confirm Payment </span></h6>
</div>
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Pribadi</h4>
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="row w-100 mb-3">
                        <div class="col-sm-6 col-12">
                            <b>Nama</b>
                        </div>
                        <div class="col-sm-6 col-12">
                            : 
                        </div>
                    </div>
                    <div class="row w-100 mb-3">
                        <div class="col-sm-6 col-12">
                            <b>Alamat</b>
                        </div>
                        <div class="col-sm-6 col-12">
                            : 
                        </div>
                    </div>
                    <div class="row w-100 mb-3">
                        <div class="col-sm-6 col-12">
                            <b>No Phone</b>
                        </div>
                        <div class="col-sm-6 col-12">
                            : 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Penjualan</h4>
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="row w-100 mb-3">
                        <div class="col-sm-6 col-12">
                            <b>Produk yang dibeli:</b>
                        </div>
                        <div class="col-sm-6 col-12 d-none d-sm-flex flex-column">
                            <b>Harga:</b>
                        </div>
                    </div>



                        <div class="row w-100 mb-3">
                            <div class="col-sm-6 col-12">

                        </div>
                            <div class="col-sm-6 col-12">
                              









                            </div>
                        </div>


                    <div class="row w-100 mb-3">
                        <div class="col-sm-6 col-12">
                            <b>Total Dibayar:</b>
                        </div>
                        <div class="col-sm-6 col-12">

                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <form action="" method="post">
                        
                        <a href=""  class="btn btn-success">Return to Menu</a>
                        <a href="" target="_blank" class="btn btn-danger">Cetak Struk</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
