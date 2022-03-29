@extends('back-end.admin-app')
@section('title','Blog')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css">
<style>
	.sdr-img-v {
		max-width: 200px;
		margin: 20px 0;
	}
	.sdr-img-v img {
		width: 100%;
	}
	#simpletable img {
		width: 150px;
	}
</style>
@endsection

@section('content')
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="page-header-title">
						<h4>Contact</h4>
					</div>
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item">
								<a href="index-2.html">
									<i class="icofont icofont-home"></i>
								</a>
							</li>
							<li class="breadcrumb-item"><a href="#!">Pages</a>
							</li>
							<li class="breadcrumb-item"><a href="#!">Contact</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Contact US</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<form action="{{ route('admin.contactSubmit') }}" enctype="multipart/form-data" method="post">
											@csrf
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Company Name</label>
													<input type="text" id="company_name" name="company_name" class="form-control" value="{{@$data->company_name }}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Address</label>
													<textarea id="address" name="address" class="form-control">{{@$data->address}}</textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Tel</label>
													<input type="text" id="tel" name="tel" class="form-control" value="{{@$data->tel}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Fax</label>
													<input type="text" id="fax" name="fax" class="form-control" value="{{ @$data->fax}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Email</label>
													<input type="text" id="email" name="email" class="form-control" value="{{ @$data->email}}">
												</div>
											</div> 

											<div class="card-header" style="padding-left:0;">
												<h5>Other</h5>
												<div class="card-header-right">
													<i class="icofont icofont-rounded-down"></i>
													<i class="icofont icofont-refresh"></i>
													<i class="icofont icofont-close-circled"></i>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Company Name</label>
													<input type="text" id="company_name_o" name="company_name_o" class="form-control" value="{{@$data->company_name_o }}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Address</label>
													<textarea id="address_o" name="address_o" class="form-control">{{@$data->address_o}}</textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Tel</label>
													<input type="text" id="tel_o" name="tel_o" class="form-control" value="{{@$data->tel_o}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Fax</label>
													<input type="text" id="fax_o" name="fax_o" class="form-control" value="{{ @$data->fax_o}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Email</label>
													<input type="text" id="email_o" name="email_o" class="form-control" value="{{ @$data->email_o}}">
												</div>
											</div> 

											<div class="card-header" style="padding-left:0;">
												<h5>Requisites</h5>
												<div class="card-header-right">
													<i class="icofont icofont-rounded-down"></i>
													<i class="icofont icofont-refresh"></i>
													<i class="icofont icofont-close-circled"></i>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Company Code</label>
													<input type="text" id="company_code" name="company_code" class="form-control" required="" value="{{@$data->company_code}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Vat code</label>
													<input id="vat_code" name="vat_code" class="form-control" value="{{ @$data->vat_code}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Bank name</label>
													<input type="text" id="bank_name" name="bank_name" class="form-control" required="" value="{{@$data->bank_name}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Bank code</label>
													<input type="text" id="bank_code" name="bank_code" class="form-control" required="" value="{{@$data->bank_code}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Other code</label>
													<input type="text" id="other_code" name="other_code" class="form-control" required="" value="{{@$data->other_code }}">
												</div>
											</div>

											<div class="card-header" style="padding-left:0;">
												<h5>Director:</h5>
												<div class="card-header-right">
													<i class="icofont icofont-rounded-down"></i>
													<i class="icofont icofont-refresh"></i>
													<i class="icofont icofont-close-circled"></i>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Director name</label>
													<input type="text" id="director_name" name="director_name" class="form-control" required="" value="{{ @$data->director_name}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Director Tel</label>
													<input id="director_tel" name="director_tel" class="form-control" value="{{ @$data->director_tel}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label"> Deputy Director name</label>
													<input type="text" id="de_director_name" name="de_director_name" class="form-control" required="" value="{{ @$data->de_director_name}}">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Deputy Director name</label>
													<input type="text" id="de_director_tel" name="de_director_tel" class="form-control" required="" value="{{ @$data->de_director_tel}}">
												</div>
											</div>
											<div class="form-group row" id="">
												<input type="submit" class=" ml-20 btn btn-primary" value="Update">
											</div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('back-end.inc.admin-right-bar')
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
<script>
	$(function(){
		$("#simpletable").DataTable();
		$('.close-modal').on("click", function() {
			$("#modal-13").modal('hide');
		});
	});
	window.base_url = '<?= url('/')?>';
	window.insert_blog = '<?= url('admin/insert-blog')?>';
	window.edit_blog = '<?= url('admin/get-blog')?>';
	window.update_blog = '<?= url('admin/update-blog')?>';
	window.delete_blog = '<?= url('admin/delete-blog')?>';
</script>
@endsection
