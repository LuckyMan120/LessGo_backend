Hello {{$user->name}}! </br>

{{$from->name}} has deleted the trip towards {{$trip->to_town}}. You can rate your decision.</br>

<a href="{{$url}}">Rate</a></br>

Regards ! </br>

LessGo </br>
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>