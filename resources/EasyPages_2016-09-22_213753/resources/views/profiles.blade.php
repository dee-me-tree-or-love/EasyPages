{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('fname', 'Fname:') !!}
			{!! Form::text('fname') !!}
		</li>
		<li>
			{!! Form::label('lname', 'Lname:') !!}
			{!! Form::text('lname') !!}
		</li>
		<li>
			{!! Form::label('dob', 'Dob:') !!}
			{!! Form::text('dob') !!}
		</li>
		<li>
			{!! Form::label('address_id', 'Address_id:') !!}
			{!! Form::text('address_id') !!}
		</li>
		<li>
			{!! Form::label('sex', 'Sex:') !!}
			{!! Form::text('sex') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}