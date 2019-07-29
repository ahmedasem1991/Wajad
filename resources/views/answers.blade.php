{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('question_id', 'Question_id:') !!}
			{!! Form::text('question_id') !!}
		</li>
		<li>
			{!! Form::label('answers', 'Answers:') !!}
			{!! Form::text('answers') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('request_id', 'Request_id:') !!}
			{!! Form::text('request_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}