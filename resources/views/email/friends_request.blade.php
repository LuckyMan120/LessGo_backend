Hello {{$user->name}}!
<br>
{{$from->name}}  wants to be your friend.
<br>
Click <a href={{$url}}>HERE</a> if you want to see your friend request
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>
