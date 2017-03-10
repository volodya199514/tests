@foreach($users as $user)
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->surname}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->address}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->comments()->count()}}</td>
    <td>{{$user->lastComment()}}</td>
</tr>

@endforeach
