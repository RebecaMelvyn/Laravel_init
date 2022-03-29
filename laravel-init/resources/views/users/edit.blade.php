@extends('layout')

@section('content')

    <div class="my-4">
        <h1>Modifier l'utilisateur</h1>

        <form action="{{route('users.update', $user)}}" method="POST" class="my-3">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="text my-3 col">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ $user->name }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text my-3 col">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="text my-3 col">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text my-3 col">
                    <label for="password_confirmation">Confirmer mot de passe :</label>
                    <input type="password" id="password_confirmation"
                           name="password_confirmation" value="{{ $user->password }}"
                           class="form-control @error ('password-confirmation')is-invalid @enderror">
                    @error ('password_confirmation')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                @if(Auth::user()->is_admin)
                    <div class="text my-3 col">

                        <label for="role">Role de l'user</label>
                            {{$role = $user->is_admin }}
                            <select id="role" name="role">
                            <option id="admin" name="admin" @if($role=="1")@endif>Admin</option>
                            <option id="user" name="user" @if($role=="0") selected="selected"@endif>User</option>
                            </select>
                        @if("role"=="1")
                            {{$user->is_admin == '1'}}
                        @else
                            {{$user->is_admin == '0'}}
                            @endif


                    </div>
                @endif
            </div>
            <input class="btn btn-primary" type="submit" id="submit" value="Modifier l'utilisateur">
        </form>
    </div>

@endsection

<style>
    .my-3{
        background-color: mediumpurple;
        padding: 2%;
        border-radius: 20px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        color: white;
    }
</style>
