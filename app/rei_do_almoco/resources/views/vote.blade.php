@extends('layout.app')

@section('title','Votação')

@section('body')
{{--<div class="container-fluid h-100">--}}
{{--<section id="main">--}}
    <div class="page-header text-center">
        <h5 class="pt-2">
            A votação acontece todos os dias, entre
            {{$config[0]->start_time_vote != '' ? $config[0]->start_time_vote : '00:00' }}
            e
            {{$config[0]->end_time_vote != '' ? $config[0]->end_time_vote : '00:00' }} !
        </h5>
        <span class="clock" id="clock"></span>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 left">
                @if(isset($weekWinner) && count($weekWinner) > 0)
                {{--<div class="container-fluid">--}}
                <div class="py-3 text-center">
                    <h3>Reis das Semanas anteriores</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Semana</th>
                            <th>Votos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($weekWinner as $winner)
                        <tr>
                            <td class="align-middle"><img class="img-thumbnail" src="{{asset('/storage/pictures/'.$winner->picture)}}"></td>
                            <td class="align-middle">{{$winner->name}}</td>
                            <td class="align-middle">{{$winner->week_year}}</td>
                            <td class="align-middle">{{$winner->votes}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="col-md-4 center ">
                <div class="row">
                    <div class="col-md-12 col_vote">
                        <div class="py-3 text-center">
                            @if($isTimeVote == 1)
                                <h3>Vote nos candidatos a rei do almoço!</h3>
                            @elseif(isset($winner) && count($winner) > 0 && $isTimeVote == "after")
                                <h3>Parabéns {{$winner->name}} você foi escolhido o rei do almoço de hoje com {{$votes}} votos!</h3>
                            @endif
                        </div>
                    </div>
                </div>

                @if(isset($candidate) && count($candidate) > 0 && $isTimeVote == 1)
                    <div class="row justify-content-center">
                        @foreach( $candidate as $cand)
                            <div class="col-md-4">
                                <form method="post" action="/votar">
                                    @csrf
                                    <div class="card card-voto">
                                        <input value="{{$cand->id}}" name="id" id="id" hidden>
                                        <img src="{{asset('/storage/pictures/'.$cand->picture)}}"
                                             class="img-thumbnail" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{$cand->name}}</h5>
                                            <button class="btn btn-outline-success" type="submit" {{$isTimeVote != true ? 'hidden' : ''}}>Votar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        {{$candidate->links()}}
                    </div>
                @elseif(isset($winner) && count($winner) > 0 && $isTimeVote === "after" )
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card card-voto">
                                <input value="{{$winner->id}}" name="id" id="id" hidden>
                                <img src="{{asset('/storage/pictures/'.$winner->picture)}}"
                                     class="img-thumbnail" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$winner->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4 right">
                @if(isset($minorVote) && count($minorVote) > 0)
                    <div class="container-fluid">
                        <div class="py-3 text-center">
                            <h3>Candidatos menos votados</h3>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Semana</th>
                                <th>Votos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($minorVote as $minor)
                                <tr>
                                    <td class="align-middle"><img class="img-thumbnail" src="{{asset('/storage/pictures/'.$minor->picture)}}"></td>
                                    <td class="align-middle">{{$minor->name}}</td>
                                    <td class="align-middle">{{$minor->week_year}}</td>
                                    <td class="align-middle">{{$minor->qtd}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{--</div>--}}


    {{--<div class="col-right">--}}
        {{----}}
    {{--</div>--}}
{{--</div>--}}
{{--</section>--}}
@endsection
