@extends('backend.layout.app')

@section('title', 'Inbox')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('css')
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
@include('backend.partials.card-message')
<div class="row">
    <div class="col-md-3">
        <a href="{{route('admin.messages.compose')}}" class="btn btn-primary btn-block mb-3">Compose</a>
        @include('backend.partials.message-notification')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($messages as $item_message)
                  <tr>
                    <td class="mailbox-name"><a href="{{route('admin.messages.read', $item_message->id)}}">{{$item_message->name}}</a></td>
                    <td class="mailbox-subject"><b class="text-danger">{{$item_message->status == '1' ? 'New Message - '  : ''}}</b> {{$item_message->subject}}
                    </td>
                    <td class="mailbox-date">{{$item_message->created_at->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('js')
<!-- Page specific script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
@endsection
