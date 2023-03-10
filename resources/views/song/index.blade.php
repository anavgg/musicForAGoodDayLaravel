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
    <form method="GET" action="{{ route('song.search') }}">
      <div class="form-group">
        <input type="text" class="form-control" id="txtNombre" name="query" placeholder="Search songs....">
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="played-songs">Played Songs
        </label>
      </div>
      <button type="submit" class="btn btn-primary btn-custom">Buscar</button>
    </form>
  @foreach ($songs as $item)
    <div class="col-md-3 text-center">

      
      <img src="{{ $item->image }}"  width="75px" height="75px" alt="Song's Cover" />
      <h5 class="text-primary">{{ ucfirst($item->song) }}</h5>
      <p class="text-primary mb-1">{{ ucfirst($item->artist) }}</p>
      <p class="text-primary mb-1">{{ ucfirst($item->gender) }}</p>
      
    </div>
    <div class="col-md-3 text-center center mt-1">
      <br/>
      <a href=" {{ $item->youtube }}" target="_blank" class="btn btn-primary btn-sm mb-1">▶</a>
      @if ($item->user_id == Auth::user()->id)
      <a href="/edit/{{$item->id }}" class="btn btn-success btn-sm mb-1">✎</a>
      <a href="{{ route('song.destroy', $item->id) }}" class="btn btn-danger btn-sm mb-1" onclick="return deleteSong('Are you sure you want to delete this song?')">X</a>
      @endif
      <script>
        function deleteSong(value) {
          action = confirm(value) ? true:event.preventDefault()
        }
      </script>
      <br>
      <p class="text-secondary">Song sent by <br/> 💜{{ $item->user->name }}💜</p>
      @if ($item->listened == 'no')
      <form action="{{ route('song.markAsListened', $item) }}" method="POST" style="display: inline">
        @csrf
        <button type="submit">Listened</button>
      </form>
      @endif

    </div>
  @endforeach
    </div>
  </div>
</div>





@endsection

</body>
</html>