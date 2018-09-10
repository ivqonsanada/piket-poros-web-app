@extends('layouts.main')
@section('content')

<div class="pageWrapper blocksWrapper">
    <section class="block">
        <h3 class="block--title">
            Login
        </h3>
        <form action="{{ route('user.postLogin') }}" method="post">
            @csrf
            @if ( isset($call) )
            <div class="alert-danger">
                <strong>{{ $call['message'] }}</strong>
            </div>
            @endif
            <input type="text" name="username" placeholder="NIM" value= "@if ( isset($call) ){{ $call['nim'] }}@endif" autocomplete="off" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="actionWrapper">
                <a href="https://bais.ub.ac.id/session/forget/">Lupa Password?</a>
                <button type="submit" class="cta cta-colored cta-blue">Login</button>
            </div>
        </form>

    </section>
</div>
@endsection