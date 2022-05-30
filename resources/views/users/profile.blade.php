@extends('layouts.login')

@section('content')


@if($username->id == auth()->user()->id)

<!-- ログインユーザーのblade -->

 <div class="profile-wrapper">
    <figure class = profile-icon><img src= "{{ asset('storage/images/'.$user->images) }}" class = "icon" ></figure>
        <div class="profile">
            {!! Form::open(['url' => '/profile', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id',$user->id) !!}
            <div class="profile-form">
                <div class="profile-form-f">
                    {{Form::label('name','username',['class' => 'label-control'])}}
                    {{Form::text('name', $user->username, ['class' => 'form-control', 'id' =>'name'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('name')}}</span>
                <div class="profile-form-f">
                    {{Form::label('email','mail-adress',['class' => 'label-control'])}}
                    {{Form::email('email', $user->mail, ['class' => 'form-control', 'id' =>'email'])}}
                </div>
                <span class="text-danger">{{$errors->first('email')}}</span>
                <div class="profile-form-f">
                    {{Form::label('password','password',['class' => 'label-control'])}}
                    {{Form::password('password', ['class' => 'form-control', 'id' =>'password'])}}
                </div>
                <span class="text-danger">{{$errors->first('password')}}</span>
                <div class="profile-form-f">
                    {{Form::label('password_confirmation','password_confirmation',['class' => 'label-control'])}}
                    {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation'])}}
                </div>
                <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                <div class="profile-form-f">
                    {{Form::label('bio','bio',['class' => 'label-control'])}}
                    {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' =>'bio'])}}
                </div>
                <span class="text-danger">{{$errors->first('bio')}}</span>
                <!-- <form method="put" action="/profile" enctype="multipart/form-data"> -->
                <div class="profile-form-f">
                    <label for="profile_image" class="label-control" >image</label>

                    <label for="profile_image" class="image-form-control">
                    <!-- <img src="{{ asset('storage/profiles/'.$user->images) }}" id="img"> -->
                    <div class = file-control>
                        <label class = "file-image">
                            <input id="images" type="file"  name="images" onchange="previewImage(this);" class="profile-form-6">ファイルを選択
                        </label>
                    </div>
                    </div>
                </label>
                </div>
                <div class="profile-form-btn">
                    {{Form::submit(' 更新 ', ['class'=>'btn btn-success rounded-pill'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>


@else

<!-- 他ユーザーのblade -->
<div class = profile-follow-wrapper>
    <img src="{{ asset('storage/images/'.$username->images) }}" alt="プロフィール画像" class = "icon">
    <div class = profile-follow-list>
        <div class=profile-name><div class=profile-label >name</div><div class =profile-about>{{$username -> username}}</div></div>
        <div class=profile-bio><div class=profile-label >bio</div><div class =profile-about>{{$username -> bio}}</div></div>
    </div>
    <div class="follow-button">
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

<div class="post-wrapper">
                @foreach($posts as $post)
                <ul>
                  <li class = posts-list>
                    <div class = posts>
                    <figure><img src="{{ asset('storage/images/'.$post->User->images) }}" class = "icon"></figure>
                    <div class=post-content>
                        <div class=post-name>{{ $post->User->username }}</div>
                        <div class=post-post>{{$post->post}}</div>
                    </div>
                        <div class=post-created_at>{{$post->created_at}}</div>
                    </div>
                    </li>
                </ul>
                @endforeach
</div>



@endif

@endsection
