@extends('backend.layout.app')

@section('title', 'Compose')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/summernote/summernote-bs4.min.css">
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
				<h3 class="card-title">Compose New Message</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="form-group">
				  <input class="form-control" placeholder="To:">
				</div>
				<div class="form-group">
				  <input class="form-control" placeholder="Subject:">
				</div>
				<div class="form-group">
					<textarea id="compose-textarea" class="form-control" style="height: 300px">
						<h1><u>Heading Of Message</u></h1>
						<h4>Subheading</h4>
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
						was born and I will give you a complete account of the system, and expound the actual teachings
						of the great explorer of the truth, the master-builder of human happiness. No one rejects,
						dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
						how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
						is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
						but because occasionally circumstances occur in which toil and pain can procure him some great
						pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
						except to obtain some advantage from it? But who has any right to find fault with a man who
						chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
						produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
						dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
						blinded by desire, that they cannot foresee</p>
						<ul>
							<li>List item one</li>
							<li>List item two</li>
							<li>List item three</li>
							<li>List item four</li>
						</ul>
						<p>Thank you,</p>
						<p>John Doe</p>
					</textarea>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<div class="float-right">
					<button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
					<button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
				</div>
				<button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('js')
<!-- Summernote -->
<script src="{{asset('/')}}backend/assets/plugin/summernote/summernote-bs4.min.js"></script>

<script>
	$(function(){
		// Summernote
		$('#compose-textarea').summernote();
	})
</script>
@endsection
