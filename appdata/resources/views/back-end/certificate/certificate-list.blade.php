@extends('back-end.admin-app')
@section('title','Main Slider')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<style>
	.sdr-img-v {
		max-width: 200px;
		margin: 20px 0;
	}

	.sdr-img-v img {
		width: 100%;
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
						<h4>Certificate</h4>
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
							<li class="breadcrumb-item"><a href="#!">Certificate</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Certificate</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<form action="" id="certificate_form" role="form" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
												<div class="col-sm-6">
													<label class="col-form-label">file</label>
													<input type="file" id="" name="file" class="form-control">
												</div>
												<div class="col-sm-6 {{$data ? '' : 'invisible'}}" id="file_area">
													<div
														style="display: flex;height: 100%;align-items: center;padding-top: 30px;">
														<i class="ti-file" style="font-size: 30px;"></i> <span
															class="file-name">{{$data ? $data->file : ''}}</span>
													</div>
												</div>
												<div class="col-sm-6">
													<label class="col-form-label">Price</label>
													<input type="text" id="" name="price" class="form-control"
														value="{{$data ? $data->price : ''}}">
												</div>
											</div>
											<div class="form-group row">
												<input type="submit" class=" ml-20 btn btn-primary " value="Update">
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
<script>
	window.base_url = '<?= url('/') ?>';
	window.update_certificate = '<?= route('admin.updateCertificate') ?>';
</script>
@endsection