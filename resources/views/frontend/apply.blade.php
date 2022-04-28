@extends('frontend.layout.app')

@section('title', 'Apply')

@section('css')
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('/')}}frontend/plugin/toastr/toastr.min.css"> 
@endsection

@section('content')
<!-- Career Start -->
<section id="Anket">
    <div class="container">
        <div class="row my-6 anket">
            <div class="col-lg-12">
                <div class="formsAnket">
                    <form action="{{route('careers.postApply', $career_detail->id)}}" method="POST" id="formApply" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h4>Apply Now</h4>
                        <label for="name">
							Name
							<input type="text" placeholder="John" name="name" id="name">
							<span class="text-danger error-text name_error"></span>
                        </label>
                        <label for="surname">
							Surname
							<input type="text" placeholder="Enn" name="surname" id="surname">
							<span class="text-danger error-text surname_error"></span>
                        </label>
                        <label for="email">
                            E-Mail
                            <input type="email" placeholder="Johnenn@mail.ru" name="email" id="email">
							<span class="text-danger error-text email_error"></span>
                        </label>
                        <label for="message">
                            Message
                            <textarea cols="30" rows="10" name="message" id="message" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laborum error suscipit tempore atque excepturi autem! Facilis sed minima illo fuga dolor? Dolor sit dicta in natus, voluptate voluptatem minima?"></textarea>
							<span class="text-danger error-text message_error"></span>
                        </label>
                        <div class="form-title">
                            <h5>CV</h5>
                        </div>
                        <div class="row fileInput">
                            <div class="col-lg-12">
                                <p>(PDF, Maks. 5.0. MB)</p>
                                <input type="file" id="real-file" hidden="hidden" name="cvFile"/>
                                <button type="button" id="custom-button">Select the file</button>
                                <span id="custom-text">No file chosen, yet.</span></br>
                                <span class="text-danger error-text cvFile_error"></span>
                            </div>
                        </div>
						<input type="hidden" value="{{$career_detail->id}}" name="inputHidden"/>
                        <div class="submitBtn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- Career End -->
@endsection

@section('js')
<!-- Toastr -->
<script src="{{asset('/')}}frontend/plugin/toastr/toastr.min.js"></script>

<script>
	$(function(){		
		$("#formApply").on('submit', function(e){
			e.preventDefault();
		
			$.ajax({
				url:$(this).attr('action'),
				method:$(this).attr('method'),
				data:new FormData(this),
				processData:false,
				dataType:'json',
				contentType:false,
				beforeSend:function(){
					$(document).find('span.error-text').text('');
				},
				success:function(data){
					if(data.status == 0){
						$.each(data.error, function(prefix, val){
							$('span.'+prefix+'_error').text(val[0]);
						});
					} else{
                        toastr.success(data.msg, data.state);
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});
	});
</script>
@endsection