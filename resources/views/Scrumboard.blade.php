<!DOCTYPE html>
<html>
<head>
    <title>Scrum Board</title>
    {!! Html::style('css/bootstrap3.min.css') !!}
    {!! Html::style('css/main.css') !!}

    {!! Html::script('http://code.jquery.com/jquery-1.11.3.min.js') !!}
    {!! Html::script('http://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}
    {!! Html::script('js/main.js') !!}

</head>
<body>
<div>
    <div id='todo' name='todo' class='col-md-3 bordered-medium status'>
        <span><h3>To Do</h3></span>
        @foreach($todos as $todo)
                <div class='bordered-light task' id='{!! $todo->id !!}' name='{!! $todo->name !!}'>
                    <div>
                        <span><h4>Name:</h4>{!! $todo->name !!}</span>
                    </div>
                    <div>
                        <span><h4>Description:</h4>{!! $todo->description !!}</span>
                    </div>
                    <div>
                        <span><h4>Points:</h4>{!! $todo->points !!}</span>
                    </div>                    
                </div>
        @endforeach
    </div>
    <div id='started' name='started' class='col-md-3 bordered-medium status'>
        <span><h3>Started</h3></span>
        @foreach($starteds as $started)
            <div class='bordered-light task' id='{!! $started->id !!}' name='{!! $started->name !!}'>
                <div>
                    <span><h4>Name:</h4>{!! $started->name !!}</span>
                </div>
                <div>
                    <span><h4>Description:</h4>{!! $started->description !!}</span>
                </div>
                <div>
                    <span><h4>Points:</h4>{!! $started->points !!}</span>
                </div>                    
            </div>
        @endforeach 

    </div>
    <div id='blocking' name='blocking' class='col-md-3 bordered-medium status'>
        <span><h3>Blocking</h3></span>  
        @foreach($blockings as $blocking)
            <div class='bordered-light task' id='{!! $blocking->id !!}' name='{!! $blocking->name !!}'>
                <div>
                    <span><h4>Name:</h4>{!! $blocking->name !!}</span>
                </div>
                <div>
                    <span><h4>Description:</h4>{!! $blocking->description !!}</span>
                </div>
                <div>
                    <span><h4>Points:</h4>{!! $blocking->points !!}</span>
                </div>                    
            </div>
        @endforeach
    </div>
    <div id='done' name='done' class='col-md-3 bordered-medium status'>
        <span><h3>Done</h3></span>
        @foreach($dones as $done)
            <div class='bordered-light task' id='{!! $done->id !!}' name='{!! $done->name !!}'>
                <div>
                    <span><h4>Name:</h4>{!! $done->name !!}</span>
                </div>
                <div>
                    <span><h4>Description:</h4>{!! $done->description !!}</span>
                </div>
                <div>
                    <span><h4>Points:</h4>{!! $done->points !!}</span>
                </div>                    
            </div>
        @endforeach
    </div>            
</div>
</body>
</html>