{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('icon', 'Icon:') !!}
			{!! Form::text('icon') !!}
		</li>
		<li>
			{!! Form::label('has_default_image', 'Has_default_image:') !!}
			{!! Form::text('has_default_image') !!}
		</li>
		<li>
			{!! Form::label('default_image', 'Default_image:') !!}
			{!! Form::text('default_image') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}