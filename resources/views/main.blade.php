@extends('layouts.admin')
@section('content')
	@if($page=='login')
		@include('auth.login')
	@elseif($page=='register')
		@include('auth.register')
	@elseif($page=='index')
		@include('pages.index')
	@elseif($page=='setting')
		@include('pages.setting')
		
	@endif
@stop
