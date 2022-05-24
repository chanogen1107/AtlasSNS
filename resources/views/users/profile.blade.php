@extends('layouts.login')

@section('content')

<!-- @if(isset($username))
<p>{{$username->id}}</p>
@else
<p>メッセージは存在しません。</p>
@endif -->

@if($username->id == auth()->user()->id)

<!-- ログインユーザーのblade -->

<p>ログインユーザーです！</p>
 <div class="card w-50 mx-auto m-5">
        <div class="card-body">
            <div class="pt-2">
                <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
            </div>
            {!! Form::open(['url' => '/profile', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id',$user->id) !!}
            <div class="m-3">
                <div class="form-group pt-1">
                    {{Form::label('name','username')}}
                    {{Form::text('name', $user->username, ['class' => 'form-control', 'id' =>'name'])}}
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group pt-2">
                    {{Form::label('email','mail-adress')}}
                    {{Form::email('email', $user->mail, ['class' => 'form-control', 'id' =>'email'])}}
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group pt-3">
                    {{Form::label('password','password')}}
                    {{Form::password('password', ['class' => 'form-control', 'id' =>'password'])}}
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group pt-4">
                    {{Form::label('password_confirmation','password_confirmation')}}
                    {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation'])}}
                    <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                </div>
                <div class="form-group pt-5">
                    {{Form::label('bio','bio')}}
                    {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' =>'bio'])}}
                    <span class="text-danger">{{$errors->first('bio')}}</span>
                </div>
                <!-- <form method="put" action="/profile" enctype="multipart/form-data"> -->

                    <label for="profile_image">image</label>

                    <label for="profile_image" class="btn">
                    <!-- <img src="{{ asset('storage/profiles/'.$user->images) }}" id="img"> -->
                    <input id="images" type="file"  name="images" onchange="previewImage(this);">
                    </label>

                    <!-- </form> -->
                 <!-- <div class="form-group pt-6">
                    {{Form::label('image','image')}}
                    {{Form::email('image', $user->images, ['class' => 'form-control', 'id' =>'image'])}}
                    <span class="text-danger">{{$errors->first('image')}}</span>
                </div> -->
                <div class="form-group pull-right">
                    {{Form::submit(' 更新する ', ['class'=>'btn btn-success rounded-pill'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@else

<!-- 他ユーザーのblade -->
<div class = profile-follow-wrapper>
    <img src="{{ asset('storage/images/'.$username->images) }}" alt="プロフィール画像" class = "icon">
    <p>{{$username -> username}}さん</p>
    <p>{{$username -> bio}}</p>
    <div class="d-flex justify-content-end flex-grow-1">
        @if (auth()->user()->isFollowing($username->id))
        <form action="{{ route('unfollow', ['id' => $username->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow', ['id' => $username->id]) }}" method="POST">
            <!-- <input type=hidden name="id"> -->
            {{ csrf_field() }}

            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
    </div>
</div>

@foreach($posts as $post)
                <div class=posts>
                    <div class=post-box>
                        <img src="{{ asset('storage/images/'.$post->User->images) }}" class = "icon">
                        <div post-content>
                            <div class=n-c-box>
                                <p class=post-name>{{ $post->User->username }}</p>
                                <p class=post-created_at>{{$post->created_at}}</p>
                            </div>
                            <p class=post-post>{{$post->post}}</p>
                        </div>
                    </div>
                </div>
@endforeach


@endif

@endsection
