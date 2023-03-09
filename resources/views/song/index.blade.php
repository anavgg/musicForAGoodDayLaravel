@extends('layouts.layout')
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload your own song</title>
</head>
<body>
@section('content')

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Song</th>
      <th scope="col">Artist</th>
      <th scope="col">Gender</th>
      <th scope="col">URL</th>
      <th scope="col">Image</th>
      <th scope="col">User</th>
    </tr>
  </thead>
  <tbody>

    <!-- @foreach ($songs as $item)
        <tr>
        
            <td>{{ $item->song }}</td>
            <td>{{ $item->artist }}</td>
            <td>{{ $item->gender }}</td>
            <td><a href="{{ $item->youtube }}">URL</a> </td>
            <td><img src="/uploads/{{ $item->image }}" width="100px" height="100px" alt="Image"> </td>
            <td>{{ $item->user->name }}</td>
        </tr>
    @endforeach -->

    @foreach ($songs as $item)
    <tr>
        <td>{{ $item->song }}</td>
        <td>{{ $item->artist }}</td>
        <td>{{ $item->gender }}</td>
        <td><a href="{{ $item->youtube }}">URL</a></td>
        <td><img src="{{ $item->image }}" /></td>
        <td>{{ $item->user->name }}</td>
    </tr>
    <tr>
        <td>Image Path:</td>
        <td colspan="5">{{ asset('public' . ($item->image)) }}</td>
    </tr>
@endforeach
      
  </tbody>
</table>



@endsection

</body>
</html>