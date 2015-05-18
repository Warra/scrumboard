<!DOCTYPE html>
<html>
<head>
    <title>Scrum Board</title>
    {!! Html::style('css/bootstrap3.min.css') !!}
    {!! Html::style('css/main.css') !!}
</head>
<body>
<div>
    <div id='todo' name='todo' class='col-md-3 bordered-medium'>
        <span><h3>To Do</h3></span>
                
    </div>
    <div id='started' name='started' class='col-md-3 bordered-medium'>
        <span><h3>Started</h3></span> 

    </div>
    <div id='blocking' name='blocking' class='col-md-3 bordered-medium'>
        <span><h3>Blocking</h3></span>    
    </div>
    <div id='done' name='done' class='col-md-3 bordered-medium'>
        <span><h3>Done</h3></span>    
    </div>            
</div>
</body>
</html>