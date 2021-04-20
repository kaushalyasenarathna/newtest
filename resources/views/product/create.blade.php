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
                                <h4 class="card-title">PRODUCT FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('product.store')}}" method="POST" class="form-card">
                                    @csrf
                                    <div class="form-group">
                                        <label for="country_code">PRODUCT NAME:</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name">
                                    </div>
                                    <label for="country_code">PRODUCT PRICE:</label>
                                    <input type="text" class="form-control" id="product_price" name="product_price">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            <a class="btn btn-danger rounded-pill" href="{{route('product.index') }}">Cansel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection