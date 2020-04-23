Hello {{$user->name}},
<br>
We inform you that your request to get on the trip to {{$trip->to_town}}, It was not answered yet by his driver.
<br>
Click <a href={{$url}}>HERE</a> if you want to see more details of the trip.
<br>
Regards !
<br>
lessgo
<br>
<br>
<small style="color: red;">If you do not want to receive this type of mail anymore, <a href="https://lessgo.app/desuscribirme?email={{ $user->email }}"> Click HERE</a>.</small>