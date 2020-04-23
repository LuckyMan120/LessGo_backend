Hello {{$user->name}}!
<br>
We remind you that you have pending requests to answer on the trip to {{$trip->to_town}}.
<br>
Click <a href="{{$url}}"> HERE </a> to see your requests.
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>
