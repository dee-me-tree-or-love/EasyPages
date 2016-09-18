{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('price', 'Price:') !!}
			{!! Form::text('price') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}