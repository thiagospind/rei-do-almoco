@extends('layout.app')

@section('body')
    <div class="container">
        <div class="card mt-3 pt-3">
            <div class="py-3 text-center">
                <h2>Cadastro de Candidatos</h2>
            </div>
            <div class="card-body">
                <form action="/candidato/novo" method="post" enctype="multipart/form-data">
                    @csrf
                    {{--<img src="{{asset('/img/user.png')}}" alt="..." class="img-thumbnail">--}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               id="name" name="name" placeholder="Insira seu nome aqui..." value="{{old('name')}}">
                        @if($errors->has('name'))
                            <div class=" {{$errors->has('name') ? 'invalid-feedback' : ''}}">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Endereço de email</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               id="email" name="email" placeholder="Insira seu email aqui..." value="{{old('email')}}">
                        @if($errors->has('email'))
                            <div class=" {{$errors->has('email') ? 'invalid-feedback' : ''}}">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="picture">Inclua uma foto sua</label>
                        <input type="file" class="form-control-file {{ $errors->has('picture') ? 'is-invalid' : '' }}"
                               id="picture" name="picture" value="{{old('picture')}}">
                        @if($errors->has('picture'))
                            <div class=" {{$errors->has('picture') ? 'invalid-feedback' : ''}}">{{$errors->first('picture')}}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
