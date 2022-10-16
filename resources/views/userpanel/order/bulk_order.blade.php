@extends('userpanel.layout.layout')

@section('content')

<style>
.custom-file{
    position: relative;
    font-family: arial;
    overflow: hidden;
    margin-bottom: 10px;
    width: auto;
    padding: 20px;
    width: 100%;
    display: flex;
    text-align: center;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border: 2px dashed #68d7fa;
    border-radius: 20px;
}
.custom-file-input{
  position:absolute;
  left:0;
  top:0;
  width:100%;
  height:100%;
  cursor:pointer;
  opacity:0;
  z-index:100;
}
.custom-file img{
  display:inline-block;
  vertical-align:middle;
}
ul.file-list{
  font-family:arial;
  list-style: none;
  padding:0;
}
ul.file-list li{
  border-bottom:1px solid #ddd;
  padding:5px;
}
.remove-list{
  cursor:pointer;
  margin-left:10px;
}
.textFile h1{
    color:#405982;
    font-weight:600;
}
.textFile strong{
    color:#68D7FA;
    font-size:18px;
}
ul.file-list li span i{
    color:red;
}

</style>


    <section>
        <section id="balance" class="balance pt-3">

            <!-- Yuxarı hisse -->
            <div class="container rounded bg-white py-3 mb-5 shadowBox">
                <div class="border rounded row m-2 px-3 py-4">
                    <span class="col-12 bulkOrderText mb-4">{{ __('userpanel.bulk order.text 1') }}</span>

                    <span class="col-12 bulkOrderText mb-4">{{ __('userpanel.bulk order.text 2') }}</span>
                    <span class="col-12 bulkOrderText mb-4">{{ __('userpanel.bulk order.text 3') }}</span>
                    <div class="col-12 my-4">
                        <a class="btn btn-info btn-file1" href="/files/examples/bulk_order_example.xlsx"
                            download="bulk_order_example.xlsx">
                            {{ __('userpanel.bulk order.text 4') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- En Yuxari hisse -->
            <!-- Asagi hisse -->
            <form action="{{ route('userpanel.create_bulk_order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container rounded bg-white py-2 shadowBox">
                    <div class="row p-4">
                        <span class="col-12 bulkOrderDownHeaderText mb-3 ms-3">{{ __('userpanel.bulk order.text 5') }}</span>
                            <div class="custom-file">
                                 <input type="file" name="order_file" class="custom-file-input" id="file" multiple onchange="javascript:updateList()">
                                <label class="custom-file-label" for="file">
                                  <img src="/images/Group (10).png" />

                                  <div class="textFile mt-2">
                                      <h1>{{ __('userpanel.bulk order.text 6') }} <br>{{ __('userpanel.bulk order.text 7') }}</h1>
                                      <strong>{{ __('userpanel.bulk order.text 8') }}</strong>
                                  </div>
                                 </label>
                            </div>
                            <ul id="fileList" class="file-list"></ul>
                    </div>
                </div>
                <div class="container py-2 d-flex justify-content-center mt-4">
                    <button class="btn btn-lg btn-primary btnBulk shadowBox" type="submit">
                        <i class="fa-solid fa-check text-white"></i> {{ __('userpanel.bulk order.text 9') }}
                    </button>
                </div>
            </form>

            <!-- End Asagi hisse -->

        </section>
    </section>

    <script>
       updateList = function() {
          var input = document.getElementById('file');
          var output = document.getElementById('fileList');
          var children = "";
          for (var i = 0; i < input.files.length; ++i) {
              children +=  '<li>'+ input.files.item(i).name + '<span class="remove-list" onclick="return this.parentNode.remove()"><i class="fa-solid fa-trash"></i></span>' + '</li>'
          }
          output.innerHTML = children;
         }
    </script>

@endsection
