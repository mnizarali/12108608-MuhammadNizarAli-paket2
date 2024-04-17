@extends('layout.dashboard')
@section('title', 'history')
@section('content')
<div class="p-2">
    <h4>Dashboard</h4>
    <h6 class="font-weight-light">Dashboard / <span class="font-weight-bold"> user </span></h6>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>History Penjualan Table</h4>
                <div class="card-header-form">
                    <div class="input-group">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>no</th>
                            <th>Sale Date</th>
                            <th>Total Price</th>
                            <th>Customer</th>
                            <th>Employee</th>
                        </tr>
                        @foreach($historys as $history)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$history->sale_date}}</td>
                            <td>{{$history->total_price}}</td>
                            <td>{{$history->customer->name}}</td>
                            <td>{{$history->user->name}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>

</script>
@endsection