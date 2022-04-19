@extends('backend.layout.app')

@section('title', 'Read')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.messages.inbox')}}">Inbox</a></li>
@endsection

@section('content')
        <div class="row">
          <div class="col-md-3">
            <a href="{{route('admin.messages.inbox')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            @include('backend.partials.message-notification')

          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><b>{{$message_data->subject}}</b></h5>
                <h6>From: {{$message_data->email}}
                  <span class="mailbox-read-time float-right">{{$message_data->created_at}}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-message">

                <p>{{$message_data->message}}</p>

                <p>Thanks,<br>{{$message_data->name}}</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
            <div class="card-footer">
              <a href="{{route('admin.messages.delete', $message_data->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection