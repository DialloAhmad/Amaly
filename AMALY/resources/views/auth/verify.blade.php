@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez Votre Adresse E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuveau lien de verification a été envoyé à votre adresse E-mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, S\'il vous plait consultez votre email pour le lien de vérification.') }}
                    {{ __('Si vous n\'avez pas recu d\'email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour demander à nouveau') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
