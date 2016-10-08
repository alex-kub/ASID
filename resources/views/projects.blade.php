@extends('layout')
@section('content')

<div id="content">
<div class="file_area">
  Список проектов:
	<ul class="list_files">
		@foreach($projects as $project)
			<li>
				<a href="/images/page/{{$project->id}}">
					{{$project->name}}
				</a>
			</li>
		@endforeach
	</ul>
</div>
</div>
@endsection