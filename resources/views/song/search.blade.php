@extends('layouts.layout')

@section('title', 'Search')

@section('content')
<div class="result">
<h3 class="text-result">Search results</h3>
            @if(isset($msg))
            <div class="alert alert-warning">
                <h5 class="result-text text-danger">{{$msg}}</h5>
            </div>
            @endif
</div>
@foreach($songs as $item)
<div class="card float-center">
      <div class="list row">
        <div class="col-sm-4">
        </div>
        <div class="col-md-left-0 d-flex">
          <div class="card-block">
            <h5 class="card-title mt-2">{{ ucfirst($item->song) }}</h5>
            <h6>{{ ucfirst($item->artist) }}</h6>
            <p>{{ ucfirst($item->gender) }}</p>
            <p class="mb-2">Proposed with 🖤 by {{ $item->user->name }}</p>
            </div>
            <div class="play card-block col-md-5">
            <a href=" {{ $item->youtube }}" target="_blank" class="youtube btn" ><img class="img-fluid" src="/img/play.png"/></a>
            </div>
            <div class="actions card-block col-md-1">
            @if ($item->user_id == Auth::user()->id)
            <a href="{{ route('song.destroy', $item->id) }}" class="btn" onclick="return deleteSong('Are you sure you want to delete this song?')"><img class="options" src="/img/delete.png"/></a>
            <br/>
            @if ($item->listened == 'no')
            <form class="listen" action="{{ route('song.markAsListened', $item) }}" method="POST">
              @csrf
              <button class="btn-xs ml-2"type="submit">✔️</button>
            </form>
            @endif
            <a href="/edit/{{$item->id }}" class="btn"><img class="options" src="/img/edit.png"/></a>
            @endif
            <script>
              function deleteSong(value) {
                action = confirm(value) ? true:event.preventDefault()
              }
            </script>
          </div>
        </div> 
      </div>
    </div>
@endforeach
<div class="pagination-container d-flex justify-content-center" style="margin-top: 3em;">
<a href="{{ route('listened.index') }}" class="listened-song btn">See your listened songs</a>
  <p class="pagination">{{ $songs->links('pagination::bootstrap-5') }}</p>
</div>
<!--    
    <div class="container d-flex justify-content-md-center">
        <div class="w-75 p-3 overflow-hidden" style="min-height: 650px; max-height: 650px; background-color: #eee; border-radius: 1em; overflow: scroll;">
            <h3 class="text-primary text-center">Resultados de la búsqueda</h3>
            <br/>
            @if(isset($msg))
            <div class="alert alert-warning">
                <h5 class="text-danger">{{$msg}}</h5>
            </div>
            @endif
            <div class="song d-flex justify-content-md-center row text-primary">
                
                @foreach ($songs as $song)
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('img/uploads/' . $song->image) }}"  width="75px" height="75px" alt="Song's Cover" /> -->
                        <!-- <h5 class="text-primary">{{ ucfirst($song->song) }}</h5>
                        <p class="text-primary mb-1">{{ ucfirst($song->artist) }}</p>
                        <p class="text-primary mb-1">{{ ucfirst($song->gender) }}</p>   
                    </div>
                    <div class="col-md-3 text-center center mt-1">
                        
                        <a href=" {{ $song->youtube }}" target="_blank" class="btn btn-primary btn-sm mb-1">▶</a>
                        @if ($song->user_id == Auth::user()->id)
                        <a href="/edit/{{$song->id }}" class="btn btn-success btn-sm mb-1">✎</a>
                        <a href="{{ route('song.destroy', $song->id) }}" class="btn btn-danger btn-sm mb-1" onclick="return deleteSong('Are you sure you want to delete this song?')">X</a>
                        @endif
                        <script>
                            function deleteSong(value) {
                            action = confirm(value) ? true:event.preventDefault()
                            }
                        </script>
                        <br>
                        <p class="text-secondary">Song sent by <br/> 💜{{ $song->user->name }}💜</p>
                        @if ($song->listened == 'no')
                        <form action="{{ route('song.markAsListened', $song) }}" method="POST" style="display: inline">
                            @csrf
                            <button type="submit">Listened</button>
                        </form>
                        @endif
                    </div>
                @endforeach
                </div>
                <div class="pagination-container" style="margin-top: 3em;">
                    {{ $songs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>  -->


@endsection






