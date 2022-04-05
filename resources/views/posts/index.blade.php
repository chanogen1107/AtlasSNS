@extends('layouts.login')

@section('content')
<div class =tweet>
<img src="images/arrow.png">
<div class =tweet-form>
      {{ Form::label('') }}
      {{ Form::text('post',null,['class' => 'tweet-input']) }}
    </div>
     <div class =tweet-button>
  {{ Form::submit('tweet',['class' => 'button']) }}
</div>

</div>

@endsection