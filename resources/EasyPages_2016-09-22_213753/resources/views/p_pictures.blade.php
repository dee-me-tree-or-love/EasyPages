{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('profile_id', 'Profile_id:') !!}
			{!! Form::text('profile_id') !!}
		</li>
		<li>
			{!! Form::label('pathsmall', 'Pathsmall:') !!}
			{!! Form::text('pathsmall') !!}
		</li>
		<li>
			{!! Form::label('pathmed', 'Pathmed:') !!}
			{!! Form::text('pathmed') !!}
		</li>
		<li>
			{!! Form::label('pathlarge', 'Pathlarge:') !!}
			{!! Form::text('pathlarge') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}