@extends('layouts.admin')
@section('contant')
	@if($page=='login')
		@include('auth.login')
	@endif
@stop
