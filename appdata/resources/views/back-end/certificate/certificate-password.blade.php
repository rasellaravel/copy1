@extends('back-end.admin-app')
@section('title','Product')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css')}}">
<!-- jpro forms css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/demo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/j-forms.css') }}">

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
						<h4>Cerficate Password</h4>
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
							<li class="breadcrumb-item"><a href="#!">Cerficate Password</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Upload A New Cerficate Password</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<div class="form-group row">
											<div class="col-sm-12">
												<label class="form-label">Cerficate password</label>
												<input type="password" class="form-control" name="password" id="password" required placeholder="Cerficate password">
											</div>
										</div>

										<div class="form-group row" id="">
											<input type="submit" onclick="insertCerPass()" class=" ml-20 btn btn-primary " value="submit">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<!-- data table -->
							<div class="card">
								<div class="card-header">
									<h5>Certificate Password</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div class="dt-responsive table-responsive">
										<table id="simpletable" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>#</th>
													<th>Password</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody class="data">
												<?php $n = 0; ?>
												@foreach($data as $value)
												<tr class="tr-{{++$n}}">
													<td>{{$n}}</td>
													<td class="td-{{$n}}">{{$value->password}}</td>
													<td>
														<button type="button" onclick="editCerPass(<?=$value->id ?>,<?=$n?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
														<button class="btn btn-sm btn-danger" onclick="deleteCerPass(<?=$value->id?>)"><i class="icon-trash"></i></button>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
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
<div class="md-modal md-effect-13" id="modal-13">
	<div class="md-content">
		<h3 class="bg-dark">Certificate Password</h3>
		<div class="well">
			<label for="">Password:</label>
			<input type="password" class="form-control" id="passwordEdit" name="">
			<input type="text" id="idedit" hidden="">
			<input type="hidden" class="tdNuber">
			<div class="m-btn-area">
				<button class=" md-close btn btn-dark close-modal"> cancel</button>
				<button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updateCerPass()" >Save</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modalEffects.js')}}"></script>
<script>
	$(function(){
		$("#simpletable").DataTable();
		$('.close-modal').on("click", function() {
			$("#modal-13").modal('hide');
		});
	});
	window.insert_certificate_password = '<?= url('admin/insert-certificate-password')?>';
	window.edit_certificate_password = '<?= url('admin/get-certificate-password')?>';
	window.delete_certificate_password = '<?= url('admin/delete-certificate-password')?>';
	window.update_certificate_password = '<?= url('admin/update-certificate-password')?>';
</script>
@endsection
