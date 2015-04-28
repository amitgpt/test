@extends('layouts.admin')
@section('content')
	@if($page=='login')
		@include('auth.login')
	@elseif($page=='register')
		@include('auth.register')
	@endif
@stop
