@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			Add New Products
		</div>
		<div class="card-body">
			<form action="{{ route('blogs.store')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="Enter Product Name" class="form-control" autofocus="{{old('name')}}">
					@if($errors->has('name'))
 					<strong class="text-danger">{{ $errors->first('name') }}</strong>
 					@endif
				</div>

				<div class="input-group">
                     <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                        </a>
                     </span>
                     <input id="thumbnail" class="form-control" type="text" name="image" autofocus="{{old('image')}}">
                </div>
                @if($errors->has('image'))
                    <strong class="text-danger">{{ $errors->first('image') }}</strong>
                 @endif
                <img id="holder" style="margin-top:15px;max-height:100px;">

				<div class="form-group">
                      <label for="description">Description:</label>
                      <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                      @if($errors->has('description'))
                       <strong class="text-danger">{{ $errors->first('description') }}</strong>
                       @endif
                 </div>

                 <div class="form-group">
                   	<button type="Submit" class="btn btn-success btn-md btn-block">Submit</button>
                  </div>

			</form>
		</div>

	</div>

</div>
@endsection

@section('js')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  	 $('#lfm').filemanager('image');
     CKEDITOR.replace('description', options);
</script>

@endsection
