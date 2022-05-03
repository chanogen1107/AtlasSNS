@extends('layouts.login')

@section('content')

<img src="{{ asset('storage/profiles/'.$username->images) }}" alt="プロフィール画像">
<p>{{$username -> username}}さん</p>
<p>{{$username -> bio}}さん</p>
@endsection