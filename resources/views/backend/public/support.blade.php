@extends('backend.layout.app')

@section('title', 'Support')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')

    <style>
        .support-chat-hm {
            outline: 1px solid #d7dadeb2;
            padding: 15px 10px;
            overflow: auto;
            height: 20vw;
            background: #17060617;
        }

        .support__message {
            margin-top: 4rem;
        }

        .support__message-btn {
            font-size: 2rem;
        }

        .support__message-left {
            background-color: #fff;
            margin-top: 2rem;
        }

        .support__message-right {
            background-color: #fff;
            margin-top: 2rem;
        }

        .support__message-chat {
            background-color: #fff;
            width: 100%;
            height: 10rem;
            padding: 2rem 2rem;
            height: auto;
        }

        .support__message-chat h4 {
            line-height: 16px;
            color: #405982;
            font-weight: 500;
            font-size: 14px;
        }

        .support__message-chatbox {
            padding: .6rem .8rem 0.4rem .8rem;
            background: #FFFFFF;
            outline: 0.5px solid rgba(0, 0, 0, 0.25);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 100%;
            transition: all 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .support__message-chatbox p {
            font-weight: 400;
            font-size: 15px;
            line-height: 24px;
            color: #000000;
        }
        .support__message-chatbox:hover{
            transform: scale(1.1);
            cursor: cell;
            outline: 2px solid rgb(10 229 10);
        }

        .support__message-time {
            margin-top: 2rem;
            display: flex;
            justify-content: flex-end;
        }

        .support__message-time p {
            font-weight: 400;
            font-size: 12px;
            line-height: 14px;
            color: rgba(0, 0, 0, 0.41);
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Support demands</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>View chat</th>
                                <th>status</th>
                                <th>User ID</th>
                                <th>Orders</th>
                                <th>Cause</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Document</th>
                                <th>Date</th>
                                <th>Close/Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($support_demands as $demand)
                                <tr>
                                    <td>{{ $demand->id ? $demand->id : '---' }}</td>
                                    <td>
                                        <div class="edit_view_buttons_div">
                                            <a href="#" class="btn btn-info"
                                                onclick="viewChat('{{ $demand->id }}')">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($demand->status == 'pending')
                                            <span class="badge rounded-pill bg-primary">Pending</span>
                                        @elseif ($demand->status == 'closed')
                                            <span class="badge rounded-pill bg-warning">Closed</span>
                                        @elseif ($demand->status == 'answered')
                                            <span class="badge rounded-pill bg-success">Answered</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $demand->user_id) }}' , '_self')">
                                                010{{ $demand->user_id ? $demand->user_id : '---' }}20
                                            </span>
                                        </div>
                                    </td>
                                    @php
                                        $cargo_orders = json_decode($demand->orders);
                                    @endphp
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($cargo_orders)
                                                @foreach ($cargo_orders as $order)
                                                    <span class="badge rounded-pill bg-info user_id_badge"
                                                        onclick="window.open('{{ route('admin.cargo-requests.cargo_details', $order) }}' , '_self')">
                                                        {{ $order }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span class="badge rounded-pill bg-danger user_id_badge">
                                                    None
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $demand->cause ? $demand->cause : '---' }}</td>
                                    <td>{{ $demand->title ? $demand->title : '---' }}</td>
                                    <td>{{ json_decode($demand->text) ? json_decode($demand->text) : '---' }}</td>
                                    <td>
                                        <a href="/files/support/{{ $demand->document }}"
                                            download="{{ $demand->document }}">
                                            <p>{{ $demand->document }}</p>
                                        </a>
                                    </td>
                                    <td>{{ $demand->created_at ? $demand->created_at : '---' }}</td>
                                    <td>
                                        <div style="display: flex;gap:10px;">
                                            @if ($demand->status != 'closed')
                                                <a href="#" onclick="demandAction(this)" class="btn btn-danger"
                                                    data-demand-id="{{ $demand->id }}" data-status="closed"
                                                    data-name="Close">
                                                    <i class="fa-solid fa-square-xmark"></i>
                                                </a>
                                            @endif
                                            @if ($demand->status != 'closed')
                                                <a href="#" onclick="demandAction(this)"
                                                    class="btn btn-primary cardcredit" data-demand-id="{{ $demand->id }}"
                                                    data-status="answered" data-name="Reply">
                                                    <i class="fa-solid fa-message"></i>
                                                </a>
                                            @endif
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

    <!-- Modal -->
    <div class="modal fade" id="view-chat" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-chat-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="view-chat-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function demandAction(button) {
            var id = button.getAttribute('data-demand-id');
            var status = button.getAttribute('data-status');
            var status_name = button.getAttribute('data-name');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: true
            })

            Swal.fire({
                title: status_name + " message",
                text: "Write something for " + status_name + ": ",
                input: 'textarea',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.messages.support_message') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                            status: status,
                            message: result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data,
                                confirmButtonText: 'Okay',
                                backdrop: true,
                                timer: 4000
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Action cancelled"
                    });
                }
            });
        }
    </script>
    <script>
        function viewChat(demand_id) {
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.messages.show_support_chat') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: demand_id,
                },
                beforeSend: function() {
                    let timerInterval
                    Swal.fire({
                        position: 'center',
                        title: 'Loading Chat for demand: ' + demand_id,
                        backdrop: true,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                complete: function() {
                    setTimeout(() => {
                        Swal.hideLoading();
                    }, 1500);
                },
                success: function(data) {
                    setTimeout(() => {
                        Swal.close();

                        $('#view-chat').modal('toggle');
                        document.querySelector('#view-chat-title').innerHTML =
                            "View Chat for demand ID: " +
                            demand_id;

                        var chat_modal_body = document.querySelector('#view-chat-body');
                        $(chat_modal_body).empty();
                        console.log(data);

                        var chat_html = `
                        <div class="row support-chat-hm">
                            <div class="col-md-7 col-sm-6 col-9 user-message-box">
                            </div>
                        </div>
                        <div class="form-group mt-2 row">
                            <input class="form-control col-11" type="text" name="user_message" placeholder="Type your message">
                            <button type="button" class="btn btn-primary cardcredit col-1"
                            onclick="sendMessage(this)" data-demand-id="` + data.demand.id + `">
                                <i class="fa-solid fa-message"></i>
                            </button>
                        </div>
                        `;
                        chat_modal_body.insertAdjacentHTML('afterbegin', chat_html);

                        data.messages.forEach(element => {
                            if (element.by == "moderator") {
                                chat_html = `
                                    <div class="col-md-7 col-sm-6 col-9 mt-2 offset-5">
                                        <div class="support__message-chatbox">
                                            <p>` + JSON.parse(element.message) + `</p>
                                            <div class="support__message-time">
                                                <p>by: <b>ShipLounge Moderator</b> - </p>
                                                <p> - ` + element.created_at + ` </p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            }else{
                                chat_html = `
                                    <div class="col-md-7 col-sm-6 col-9 mt-2">
                                        <div class="support__message-chatbox">
                                            <p>` + JSON.parse(element.message) + `</p>
                                            <div class="support__message-time">
                                                <p>by: <b>User</b> - </p>
                                                <p> - ` + element.created_at + ` </p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            }
                            document.querySelector('.user-message-box').insertAdjacentHTML(
                                'afterend', chat_html);
                        });
                    }, 1500);
                }
            });
        }

        function sendMessage(button) {
            user_message = button.parentNode.querySelector('input[name="user_message"]').value;
            id = button.getAttribute('data-demand-id');

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.messages.sendMessage') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    status: "answered",
                    message: user_message
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data,
                        confirmButtonText: 'Okay',
                        backdrop: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
            });
        }
    </script>
@endsection
