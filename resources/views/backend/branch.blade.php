@extends('backend.layout.app')

@section('title', 'Branches')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.branches.index')}}">Branches</a></li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-lg-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Branch</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.branches.create.post')}}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                        <label for="selectCountry">Country</label>
                        <select class="form-control" name="selectCountry" id="selectCountry">
                            <option value="">Choose Country</option>
							@foreach($countries as $country)
                            <option value="{{$country->code}}" {{ old('selectCountry') == $country->code ? "selected" : "" }}>{{$country->name}}</option>
							@endforeach
                        </select>
                        <span class="text-danger">@error('selectCountry') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="Enter branch title" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger">@error('inputTitle') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLongitude">Longitude</label>
                        <input type="text" class="form-control" id="inputLongitude" placeholder="Enter branch longitude" name="inputLongitude" value="{{old('inputLongitude')}}">
						<span class="text-danger">@error('inputLongitude') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLatitude">Latitude</label>
                        <input type="text" class="form-control" id="inputLatitude" placeholder="Enter branch latitude" name="inputLatitude" value="{{old('inputLatitude')}}">
						<span class="text-danger">@error('inputLatitude') {{ $message }} @enderror</span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAddress">Address</label>
                        <textarea class="form-control" rows="7" placeholder="Enter branch address..." name="textareaAddress" id="textareaAddress">{{old('textareaAddress')}}</textarea>
						<span class="text-danger">@error('textareaAddress') {{ $message }} @enderror</span>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>    
</div>
@endsection