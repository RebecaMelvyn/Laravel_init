@extends('layout')

@section('content')

    <h1>Ajouter un utilisateur</h1>

    <form action="{{route('users.store')}}" method="POST" class="my-3">
        @csrf
        <div class="form-row">
            <div class="text my-3 col">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text my-3 col">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="text my-3 col">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text my-3 col">
                <label for="password_confirmation">Confirmer mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-control @error ('password-confirmation')is-invalid @enderror">
                @error ('password_confirmation')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <input class="btn btn-primary" type="submit" id="submit" value="Ajouter l'utilisateur">
    </form>

@endsection
