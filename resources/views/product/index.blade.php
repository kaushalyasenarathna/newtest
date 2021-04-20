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
                <h4 class="card-title">PRODUCT MANAGEMENT</h4>
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
                                            <h4 class="card-title"> PRODUCT TABLE</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">
                                            <span class="table-add float-right mb-3 mr-2">
                                                <a class="btn btn-primary rounded-pill"
                                                    href="{{route('product.create') }}">create</a>
                                            </span>
                                            @if ($msg = Session::get('add'))
                                            <div class="alert alert-info">
                                                <p>{{ $msg }}</p>
                                            </div>
                                            @endif
                                             <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCT ID</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>PRODUCT PRICE</th>
                                                        <th>REGISTRATION DATE</th>
                                                        <TH>UPDATION DATE</TH>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->id }}</td>
                                                        <td> {{ $data->product_name }}</td>
                                                        <td>{{ $data->product_price }}</td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>{{ $data-> updated_at }}</td>
                                                        <td>
                                                            <div class="float-right">
                                                                <form action="{{ route('product.destroy', $data->id) }}"
                                                                    method="post">
                                                                    <a class="btn btn-primary mr-3"
                                                                        href="{{ route('orders', $data->id,  $data->product_price) }}">ORDER</a>
                                                                    <a class="btn btn-success mr-3"
                                                                        href="{{ route('product.edit', $data->id) }}">edit</a>
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