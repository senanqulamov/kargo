@extends('backend.layout.app')

@section('title', 'User Logs')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Moderator ID</th>
                                <th>Title</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($log->user_id)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.users.details', $log->user_id) }}' , '_self')">
                                                    010{{ $log->user_id }}20
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    Not Settled
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($log->moderator_id)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.users.details', $log->moderator_id) }}' , '_self')">
                                                    010{{ $log->moderator_id }}20
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    Not Settled
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ $log->title ? $log->title : '---' }}
                                    </td>
                                    <td>
                                        @php
                                            $actions = json_decode($log->action);
                                        @endphp
                                        <div class="detail-block-holder">
                                            @foreach ($actions as $key => $action)
                                                <div class="detail-span-block">
                                                    <span><u>Change in:</u> {{ $key }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $date = Carbon\Carbon::parse($log->created_at)->format('d-M-Y H:i');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $date }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
