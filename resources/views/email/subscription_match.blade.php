Hello, {{$user->name}}!
<br>
We have found a trip that matches your search.<br>

<a href="{{$url}}"> You can see the detail of the matches by entering this link.</a>
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>
