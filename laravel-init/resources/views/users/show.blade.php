@extends('layout')

@section('content')

    <div class="my-4">
        <div class="left">
            <div class="top"><img src="https://source.unsplash.com/random/300x300" alt="Image"/></div>
        </div>
        <div class="right pl-2">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->email }}</h2>
            <h6>Date de création : {{ $user->created_at }}</h6>
            <h6>Date de dernière modif : {{ $user->updated_at }}</h6> <br/>

            @if($user->is_admin)
               <h5>Admin</h5>
            @elseif(!$user->is_admin)
                <h5>Non Admin</h5>
            @endif



            <div class="my-4">
                <a href="<?= url('/users'); ?>" title="">Retour à la liste</a>
            </div>
            @if(Auth::user())
                <div class="bottom d-flex align-items-center justify-content-between">
                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning my-1">Modifier l'utilisateur</a>
                    @if(Auth::user()->is_admin)
                        <div class="delete">

                            <form action="{{route('users.destroy', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="destroy" name="destroy" value="Supprimer l'utilisateur"
                                       class="btn btn-danger">
                            </form>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
