Hello {{$user->name}}!
<br>
You have just finished the trip to  {{$trip->to_town}}. Leave us a brief review about the experience with your
travel companions.
<br>
<a href="{{$url}}">Rate your experiance !</a>
<br>
Regards !
<br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>