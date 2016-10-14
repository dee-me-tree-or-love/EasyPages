{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description') !!}
		</li>
		<li>
			{!! Form::label('rating', 'Rating:') !!}
			{!! Form::text('rating') !!}
		</li>
		<li>
			{!! Form::label('profile_id', 'Profile_id:') !!}
			{!! Form::text('profile_id') !!}
		</li>
		<li>
			{!! Form::label('service_id', 'Service_id:') !!}
			{!! Form::text('service_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}