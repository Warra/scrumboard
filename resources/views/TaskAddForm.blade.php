<!DOCTYPE html>
<html>
<head>
    <title>Sprint Add Form</title>
    {{-- {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') !!} --}}
    {!! Html::style('css/bootstrap3.min.css') !!}

</head>
<body>
    <div>
        <ul class="nav nav-pills" role="tablist">
            <li class="active"><a href="/task/add/show">Add Tasks</a></li>
            <li class="active"><a href="/sprint/add/show">Add Sprints</a></li>
            <li class="active"><a href="/scrumboard">Scrumboard</a></li>
        </ul>
    </div>
    @if(isset($success))
        <div>
            <span>{!! $success !!}</span>
        </div>
    @endif
    <div class='col-md-8'>
        {!! Form::open(['url'=>action('TaskController@getAddInputs')]) !!}
        {!! Form::label('sprint_number', 'Sprint Number') !!}
        {{-- {!! Form::text('sprint_number', '', ['class' => 'form-control']) !!}<br /> --}}
        {!! Form::select('sprint_number', $sprintDetails, null, ['class' => 'form-control']) !!}<br />
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', '', ['class' => 'form-control']) !!}<br />
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', '', ['class' => 'form-control']) !!}<br />
        {!! Form::label('points', 'Points') !!}
        {!! Form::text('points', '', ['class' => 'form-control']) !!}<br />
        {!! Form::label('status', 'Status') !!}
        {{-- {!! Form::text('status', '', ['class' => 'form-control']) !!}<br /> --}}
        {!! Form::select('status', $statuses, null, ['class' => 'form-control']) !!}<br />
        {!! Form::submit('Add Task', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}
    </div>
</body>
</html>