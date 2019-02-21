@extends('front-end.master')
@section('title')
    Shipping
@endsection
@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ asset('/') }}">Home</a> / <span>Shipping</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 well text-center text-success">
                Dear {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valuable order. If your billing info & shipping info are same then just press on save shipping info button.
            </div>
        </div>
        <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Shipping</div>
                </div>
                <div class="panel-body" >
                    {{ Form::open(['route'=>'new-shipping', 'method'=>'POST', 'class'=>'form-horizontal','role'=>"form"]) }}
                    <div class="form-group">
                        <label for="fullName" class="col-md-3 control-label">Full Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $customer->firstName.' '.$customer->lastName }}" name="full_name" placeholder="Full Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $customer->email }}" name="email_address" placeholder="Email Address">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="phoneNo" class="col-md-3 control-label">Phone No</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"value="{{ $customer->phoneNo }}" name=" phone_number" placeholder="Phone No">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            <textarea type="text" class="form-control" name="address" placeholder="Address">{{ $customer->address }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-info" value="Save Shipping Info">

                        </div>
                    </div>

                    {{ Form::close() }}
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection