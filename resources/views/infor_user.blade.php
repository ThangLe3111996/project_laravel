@extends('common')
<link rel="stylesheet" href="../../css/form.css">
@section('content')
<main id="form">
    <section class="d-flex justify-content-center container">
        <div class="register col-md-8">
            <form action="{{route('updatePage')}}" method="POST">
                @if (Session::has('Success'))
                <div class="alert alert-success">{{(Session::get('Success'))}}</div>
                @endif
                <p class="title">Update information</p>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @foreach ($arr as $item)
                    @if ($item == 're-password')
                    <div>
                        <input type="password" name="{{$item}}" placeholder="Your {{$item}}...">
                    </div>
                    @error($item)
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @else
                    <div>
                        <input type="{{$item}}" name="{{$item}}" placeholder="Your {{$item}}...">
                    </div>
                    @error($item)
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @endif
                @endforeach
                <div>
                    <button type="submit">update account</button>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
