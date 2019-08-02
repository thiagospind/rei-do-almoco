@extends('layout.app')

@section('body')
<div class="container h-100">
    <div class="row justify-content-center align-items-center">
        <span class="clock" id="clock"></span>
    </div>
    @if(count($candidate) > 0 )
        <section class="grid grid-template-columns">
            @foreach( $candidate as $cand)
            <form method="post" action="/votar">
                @csrf
                <div class="card card-voto" style="width: 18rem;">
                    <input value="{{$cand->id}}" name="id" id="id" hidden>
                    <img src="{{asset('/storage/pictures/'.$cand->picture)}}" class="img-thumbnail" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$cand->name}}</h5>
                        <button class="btn btn-outline-success" type="submit">Votar</button>
                    </div>
                </div>
            </form>
            @endforeach
            <div class="row justify-content-center align-items-center">
                {{$candidate->links()}}
            </div>
        </section>
    @endif
</div>
@endsection
