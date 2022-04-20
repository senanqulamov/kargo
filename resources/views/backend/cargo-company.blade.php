@extends('backend.layout.app')

@section('title', 'Cargo')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Cargo Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Business Cargo</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <form>
                            <div class="form-group">
                                <label for="inputOldPassword" class="col-form-label">Old Password</label>
                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Enter Your Old Password">
                            </div>
                            <div class="form-group">
                                <label for="inputNewPassword" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" id="inputNewPassword" placeholder="Enter Your New Password">
                            </div>
                            <div class="form-group">
                                <label for="inputConfirmPassword" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter Confirm Password">
                            </div>													
                            <div class="form-group">
                                <label for="fileProfileImage">Profile Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileProfileImage">
                                        <label class="custom-file-label" for="fileProfileImage">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <form>
                            <div class="form-group">
                                <label for="inputOldPassword" class="col-form-label">Old Password</label>
                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Enter Your Old Password">
                            </div>
                            <div class="form-group">
                                <label for="inputNewPassword" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" id="inputNewPassword" placeholder="Enter Your New Password">
                            </div>
                            <div class="form-group">
                                <label for="inputConfirmPassword" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter Confirm Password">
                            </div>
                            <div class="form-group">
                                <label for="fileProfileImage">Profile Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileProfileImage">
                                        <label class="custom-file-label" for="fileProfileImage">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of FAQS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 4.0 </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                            <tr>
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td>-</td>
                            <td>C</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection