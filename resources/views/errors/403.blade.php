@extends('layouts.app-public')

@section('title', 'Accès Interdit')

@section('content')
<section class="section-padding" style="padding-top: 120px; min-height: 80vh; display: flex; align-items: center;">
    <div class="container text-center">
        <div style="margin-bottom: 30px;">
            <i class="fas fa-lock fa-5x" style="color: #d63031;"></i>
        </div>
        <h1 style="font-size: 72px; font-weight: 800; color: #d63031; margin-bottom: 10px;">403</h1>
        <h2 style="font-size: 28px; font-weight: 700; margin-bottom: 20px;">Accès Interdit</h2>
        <p style="color: rgba(255,255,255,0.6); font-size: 18px; margin-bottom: 30px;">
            Vous n'avez pas la permission d'accéder à cette page.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url()->previous() }}" class="btn-eventora-outline">
                <i class="fas fa-arrow-left me-2"></i> Retour
            </a>
            <a href="{{ route('home') }}" class="btn-eventora">
                <i class="fas fa-home me-2"></i> Accueil
            </a>
        </div>
    </div>
</section>
@endsection