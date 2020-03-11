@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card my-1">
				<a href="{{ route('blogs.create') }}" class="btn btn-info btn-block btn-sm">Create new blog</a>
			</div>
			<div class="card">
				<div class="card-header">
					All blogs <strong class="text-success float-right">{{ session()->get('success') }}</strong>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
                                    <th>Name</th>
                                    {{-- <th>Image</th> --}}
                                    <th>description</th>
									<th>Created_at</th>
									<th colspan="2" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blogs as $blog)
								<tr>
									<td>{{ $loop->iteration}}</td>
                                    <td>{{ $blog->name }}</td>
                                    {{-- <td ><img src="{{ $blog->image }}" alt="{{ $blog->image }}"></td> --}}
                                    <td>{{ str_limit(strip_tags($blog->description), 100) }}</td>
									<td>{{ $blog->created_at->format('M j, Y') }}</td>
									<td class="text-center"><a href="{{ route('blogs.edit', $blog->slug)}}" class="btn btn-info btn-md">edit</a></td>
									<td class="text-center">
										<form action="{{ route('blogs.destroy', $blog->slug ) }}" method="post">
						                    @csrf
						                    @method('delete')


										<!-- Button trigger modal -->
										<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#remove{{$blog->slug}}">
										  remove
										</button>

										<!-- Modal -->
										<div class="modal fade" id="remove{{$blog->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">are you sure to delete {{ $blog->name }}?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        ...
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="submit" class="btn btn-danger">Delete</button>
										      </div>
										    </div>
										  </div>
										</div>
									</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $blogs->links() }}
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
