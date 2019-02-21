@extends('admin.master')

@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class=" panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success"> {{ Session::get('message') }}</h3>


                    {{ Form::open(['route'=>'new-brand', 'method'=>'POST', 'class'=>'form-horizontal']) }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <input type="text" name="brand_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="brand_description"></textarea>
                            <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" value="1"/> Published </label>
                            <label><input type="radio" name="publication_status" value="0"/> Unpublished </label><br/>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand Info"/>
                        </div>
                    </div>
                    {{ Form::close() }}

                    {{--{{ Form::open(['route'=>'new-brand', 'method'=>'POST', 'class'=>'form-horizontal']) }}--}}
                    {{--<form action="{{ route('new-brand') }}" method="post" class="form-horizontal">--}}
{{--                        {{ csrf_field() }}--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3"> Brand Name</label>--}}

                            {{--<div class="form-group col-md-9">--}}
                                {{--<input type="text" class="form-control" name="brand_name">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3"> Brand Description</label>--}}

                            {{--<div class="form-group col-md-9">--}}
                                {{--<textarea class="form-control" name="brand_description"></textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3">publication status</label>--}}

                            {{--<div class="form-group col-md-9">--}}
                                {{--<label> <input type="radio" name="publication_status" value="1">Published</label>--}}
                                {{--<label> <input type="radio" name="publication_status" value="0">Unpublished</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3"></label>--}}
                            {{--<div class="form-group col-md-9">--}}
                                {{--<input type="submit" value="Save Brand Info" class="btn btn-success btn-block" name="btn">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--{{ Form::close() }}--}}
                    {{--</form>--}}
                </div>

            </div>
        </div>
    </div>

@endsection