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
                                <h4 class="card-title">CUSTOMER FORM</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('customer.update', $customer->id)  }}" method="POST" class="form-card">
                                @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="registration_number">COCUSTOMER NAME:</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$customer->customer_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="country_code">CUSTOMER  ADDRESS:</label>
                                        <input type="text" class="form-control" id="customer_address" name="customer_address"  value="{{$customer->customer_address}}">
                                    </div>
                                    <label for="country_code">CUSTOMER  MOBILE NUMBER:</label>
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number"value="{{$customer->mobile_number}}" >
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                    <a class="btn btn-danger rounded-pill" href="{{route('customer.index') }}">Cansel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection