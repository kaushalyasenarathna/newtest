@extends('layouts.main')
@section('content')
<script>
$(document).ready(function() {
    $("#sidebarCollapse").on('click', function() {
        $("#sidebar").toggleClass('active');
    });
});
</script>
<div class="backgroundpadding">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">ORDER MANAGEMENT</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="content-page" class="content-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title"> ORDER TABLE</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">
                                            @if ($msg = Session::get('add'))
                                            <div class="alert alert-info">
                                                <p>{{ $msg }}</p>
                                            </div>
                                            @endif
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>Customer Name</th>
                                                        <TH>QUENTITY</TH>
                                                        <TH>TOTAL PRICE</TH>
                                                        <th>REGISTRATION DATE</th>
                                                        <TH>UPDATION DATE</TH>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->id }}</td>
                                                        <td>{{ $data->product_id }} </td>
                                                        <td> {{ $data->customer_id }} </td>
                                                        <td>{{ $data->quentity }} </td>
                                                        <td>{{ $data->price }} </td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>{{ $data-> updated_at }}</td>
                                                        <td>
                                                            <div class="float-right">
                                                                <form action="{{ route('order.destroy', $data->id) }}"
                                                                    method="post">
                                                                    <a class="btn btn-success mr-3"
                                                                        href="{{ route('order.edit', $data->id) }}">edit</a>
                                                                    <div class="float-right">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection