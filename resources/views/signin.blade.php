@extends('common')
<link rel="stylesheet" href="../../css/form.css">
@section('content')
<main id="form">
    <section class="d-flex justify-content-center container">
        <div class="sign-in col-md-8">
            <form action="{{route('signinPage')}}" method="POST">
                @if (Session::has('notice'))
                <div class="alert alert-{{Session::get('notice')}}">{{Session::get('message')}}</div>
                @endif
                <p class="title">sign in</p>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @foreach ($arr as $item)
                    <div>
                        <input type="{{$item}}" name="{{$item}}" placeholder="Your {{$item}}...">
                    </div>
                    @error($item)
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                @endforeach
                <div class="d-flex justify-content-between">
                    <button type="submit">sign in</button>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
