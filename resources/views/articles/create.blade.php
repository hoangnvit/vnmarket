@extends('layouts.master')

@section('title', 'Index page')

@section('sidebar')
	@parent

	
@endsection

@section('content')

<form class='col-10 mx-auto my-2 p-4 border' method="post" action="{{ route('create') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" id="title"  name='title' placeholder="Title's here">
    <div class="col-sm-8 help-block" id="message_title"></div>
  </div>

  <div class="form-group">
    <label>Summary</label>
    <textarea class="form-control" id="summary"  name='summary' rows="3"></textarea>
    <div class="col-sm-8 help-block" id="message_summary"></div>
  </div>

  <div class="form-group">
    <label>Content</label>
  
    <textarea class="form-control" id="content" name="content" rows='7'></textarea>
    <div class="col-sm-8 help-block" id="message_content"></div>
  </div>

  <div class="form-group">
    <label >Price</label>
    <input type="text" class="form-control" id="price"  name='price' placeholder="$123.99">
    <div class="col-sm-8 help-block" id="message_price"></div>
  </div>

  <div class="form-group">
    <label >Avatar</label><br>
    <input type="file" name="pic" required="true">
  
  </div>



  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" id="group_id" name='group_id'>
    
    <?php
        foreach($items as $item) echo "<option value='".$item['id']."'>".$item['name']."</option>"

    ?>
      
    </select>
  </div>
  <div class='text-center'>

 
  <button type="submit" class="btn btn-primary " id="submit_btn">Create Post</button>
  <div class="col-sm-8 help-block" id="message_submit"></div>
</div>
  
 
</form>
@endsection


@section('script')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace( 'content', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>

<script type="text/javascript" src="{{asset('js/create_script.js')}}"></script>

@endsection



