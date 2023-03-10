@extends('layouts.layout')
<html lang="en">
<head></head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload your own song</title>
</head>
<body>
@section('content')

<div class="container d-flex justify-content-md-center">
  <div class="w-75 p-3 overflow-hidden" style="min-height: 540px; max-height: 540px; background-color: #eee; border-radius: 1em; overflow: scroll;">
  <div class="song d-flex justify-content-md-center row text-primary">
  @foreach ($listeneds as $listened)
    <div class="col-md-3 text-center">

      
      <img src="{{ $listened->song->image }}"  width="75px" height="75px" alt="Song's Cover" />
      <h5 class="text-primary">{{ ucfirst($listened->song->song) }}</h5>
      <p class="text-primary mb-1">{{ ucfirst($listened->song->artist) }}</p>
      <p class="text-primary mb-1">{{ ucfirst($listened->song->gender) }}</p>
      
    </div>
    <div class="col-md-3 text-center center mt-1">
      <br/>
      <a href=" {{ $listened->song->youtube }}" target="_blank" class="btn btn-primary btn-sm mb-1">▶</a>
      <br>
      <p class="text-secondary">Song sent by <br/> 💜{{ $listened->user->name }}💜</p>


    </div>
  @endforeach
    </div>
  </div>
</div>





@endsection

</body>
</html>