@extends('layouts.master')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('title', 'Index page')

@section('sidebar')
	@parent

	
@endsection

@section('content')

<div class="form-group">
    <label >Keywords</label>
    <input type="text" class="form-control" id="keyword"  name='keyword' placeholder="keyword">
    <div class="col-sm-8 help-block" id="message_keyword"></div>
  </div>
</hr>

  <div id="search_result"></div>

   
@endsection

@section('script')



<script type="text/javascript" src="{{asset('js/search_script.js')}}"></script>

@endsection