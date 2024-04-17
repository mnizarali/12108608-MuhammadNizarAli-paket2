@extends('layout.dashboard')
@section('title', 'Pembelian')
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

        
        <b></b>,

        tidak tersedia
    </div>
</div>

<div class="p-2">
    <h6 class="font-weight-light">Dashboard / Pembelian / <span class="font-weight-bold"> Transaction Form </span></h6>
</div>
<div class="container">
    <form action="" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="nama">Name Customer <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="" id="nama">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="telp">No Phone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="" id="telp">
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label for="alamat">Customer Address <span class="text-danger">*</span></label>
                                <textarea name="" id="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body p-4">
                <h5 class="text-dark">Produk</h5>
                <div id="productInputs">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="product">Select Product</label>
                            <select class="form-control" name="" id="product">
                                <option value="">Select Product</option>

                                <option value=""></option>

                            </select>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control" type="text" name="" required>
                        </div>
                        <div class="form-group col-12">
                            <button type="button" class="btn btn-danger" onclick="removeProductInput(this)">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info add-product"> + Add Product</button>
                    <button type="submit" class="btn btn-success ml-1 add-product"> Submit </button>
                </div>
            </div>
        </div>
</div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productInputs = document.getElementById('productInputs');
        const addProductButton = document.querySelector('.add-product');
        const cancelProductButtons = document.querySelectorAll('.cancel-product');

        addProductButton.addEventListener('click', function() {
            const newRow = productInputs.firstElementChild.cloneNode(true);
            productInputs.appendChild(newRow);
        });

        cancelProductButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (productInputs.children.length > 1) {
                    productInputs.removeChild(button.parentNode.parentNode);
                }
            });
        });
    });
</script>

@endsection

@section('scripts')
<script>
    function addProductInput() {
        var productInputs = document.getElementById('productInputs');
        var newProductInputs = productInputs.cloneNode(true); 
        productInputs.parentElement.appendChild(newProductInputs); 
        newProductInputs.querySelectorAll('input').forEach(function(input) {
            input.value = ''; 
        });
    }

    function removeProductInput(button) {
        var card = button.closest('.row');
        card.remove();
    }
</script>
@endsection