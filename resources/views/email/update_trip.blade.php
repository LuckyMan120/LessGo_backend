Hello {{$user->name}}! </br>
</br>
We inform you that {{$from->name}}  changed the conditions of your trip towards {{$trip->to_town}}.</br>
</br>
Click <a href={{$url}}>HERE</a> to see the new changes.</br>
</br>
Regards !</br>
</br>
LessGo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>
