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
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">ORDER FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('order.update', $order->id)}}" method="POST" class="form-card">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="product_id"
                                            value="  {{$order-> product_id}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name :</label>
                                        <select name="customer_id" class="form-control">
                                            @foreach ($customer as $data)
                                            <option value="{{ $data->id }}">{{ $data->customer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quentity :</label>
                                        <select name="quentity" class="form-control">
                                            ^(\s)*$\n <option value="1 ">1 </option>
                                            <option value=" 2"> 2</option>
                                            <option value=" 3"> 3</option>
                                            <option value="4 ">4 </option>
                                            <option value=" 5"> 5</option>
                                            <option value="6 "> 6</option>
                                            ^(\s)*$\n
                                        </select>
                                        ^(\s)*$\n
                                    </div>
                                    <div class="form-group">
                                        ^(\s)*$\n <input type="text" class="form-control" id="price" name="price"
                                            value="100">
                                        ^(\s)*$\n </div>
                                    ^(\s)*$\n <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                    <a class="btn btn-danger rounded-pill" href="{{route('order.index') }}">Cansel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection