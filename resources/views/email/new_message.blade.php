Hello {{$user->name}}!
<br>
<br>
{{$from->name}} sent you a new message
<br>
Click <a href="{{$url}}">HERE</a> to read it.
<br>
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>