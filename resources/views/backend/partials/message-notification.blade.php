@php ($message = DB::table('messages')->where('status', '1')->get() )

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Folders</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item active">
                <a href="{{route('admin.messages.inbox')}}" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">{{count($message)}}</span>
                </a>
            </li>
			<li class="nav-item">
				<a href="{{route('admin.messages.sent')}}" class="nav-link">
					<i class="far fa-envelope"></i> Sent
				</a>
			</li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->