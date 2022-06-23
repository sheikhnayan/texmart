


@extends('User.layouts.master')
@section('body')



<div class="col-md-12 pt-4 pb-4 bg-white border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-9 catheader2">
				<span>Return Policy</span>
			</div>

		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="container">
		<div class="row">

			<div class="col-md-12 detailspage mt-4 p-4">
				@if(isset($return_policy))
				<span>{!! $return_policy->description !!}</span>
				@endif

			</div>

		</div>
	</div>
</div>






@endsection