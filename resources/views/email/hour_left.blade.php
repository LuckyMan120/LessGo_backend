Hello {{$user->name}}!
<br>
In just over an hour, start your journey towards {{$trip->to_town}}.
<br>
Click <a href={{$url}}>HERE</a> if you want to see more details of the trip.
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>
