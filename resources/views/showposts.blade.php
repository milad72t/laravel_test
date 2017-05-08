<!DOCTYPE html>
<html lang="en">
  <head>


    <title>posts</title>

  </head>

  <body>


  @if(count($users))
  @foreach($users as $user)

  	 <h4>{{ $user->username }} with {{$user->email}} : {{ $user->title }} - {{ $user->text }}</h2>
  	

  @endforeach
  @endif



  </body>
</html>
