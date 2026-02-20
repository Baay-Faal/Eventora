@extends('layouts.app-public')

@section('title', $event->title)

@section('content')
<section class="section-padding" style="padding-top: 120px;">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success" style="background: rgba(0,184,148,0.2); color: #00b894; border: 1px solid #00b894; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="background: rgba(214,48,49,0.2); color: #d63031; border: 1px solid #d63031; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <!-- Colonne gauche : Image + Description -->
            <div class="col-lg-8">
                <div class="event-card" style="margin-bottom: 30px;">
                    <!-- Image -->
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="card-img" style="height: 400px;">
                    @else
                        <div style="height: 400px; background: #16213e; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-calendar-alt fa-5x" style="color: #6c5ce7;"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Catégorie + Statut -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span class="card-category">{{ $event->category->name }}</span>
                            @if($event->status === 'published')
                                <span style="background: rgba(0,184,148,0.2); color: #00b894; padding: 5px 15px; border-radius: 50px; font-size: 12px;">Publié</span>
                            @elseif($event->status === 'draft')
                                <span style="background: rgba(253,203,110,0.2); color: #fdcb6e; padding: 5px 15px; border-radius: 50px; font-size: 12px;">Brouillon</span>
                            @else
                                <span style="background: rgba(214,48,49,0.2); color: #d63031; padding: 5px 15px; border-radius: 50px; font-size: 12px;">Annulé</span>
                            @endif
                        </div>

                        <!-- Titre -->
                        <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 20px;">{{ $event->title }}</h1>

                        <!-- Description -->
                        <h4 style="color: var(--primary); margin-bottom: 10px;">Description</h4>
                        <p style="color: rgba(255,255,255,0.7); line-height: 1.8; margin-bottom: 20px;">
                            {{ $event->description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Colonne droite : Infos + Inscription -->
            <div class="col-lg-4">
                <!-- Infos de l'événement -->
                <div class="event-card" style="margin-bottom: 30px;">
                    <div class="card-body">
                        <h4 style="font-weight: 700; margin-bottom: 20px; color: var(--primary);">
                            <i class="fas fa-info-circle me-2"></i> Informations
                        </h4>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">DATE</div>
                            <div><i class="fas fa-calendar me-2" style="color: var(--primary);"></i> {{ $event->date_start->format('d/m/Y') }} - {{ $event->date_end->format('d/m/Y') }}</div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">HEURE</div>
                            <div><i class="fas fa-clock me-2" style="color: var(--primary);"></i> {{ $event->time_start }} - {{ $event->time_end }}</div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">LIEU</div>
                            <div><i class="fas fa-map-marker-alt me-2" style="color: var(--primary);"></i> {{ $event->location }}</div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">ORGANISATEUR</div>
                            <div><i class="fas fa-user me-2" style="color: var(--primary);"></i> {{ $event->user->name }}</div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">PLACES</div>
                            <div><i class="fas fa-users me-2" style="color: var(--primary);"></i> {{ $event->remainingPlaces() }} / {{ $event->max_participants }} restantes</div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 5px;">PRIX</div>
                            <div style="font-size: 24px; font-weight: 700;">
                                @if($event->isFree())
                                    <span style="color: #00b894;">Gratuit</span>
                                @else
                                    <span style="color: var(--primary);">{{ number_format($event->price, 0, ',', ' ') }} FCFA</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <div class="event-card">
                    <div class="card-body text-center">
                        @auth
                            @if(auth()->user()->isUser())
                                @if($event->isPublished() && !$event->isFull())
                                    @php
                                        $alreadyRegistered = $event->registrations()->where('user_id', auth()->id())->first();
                                    @endphp

                                    @if($alreadyRegistered)
                                        @if($alreadyRegistered->status === 'confirmed')
                                            <div style="margin-bottom: 15px;">
                                                <i class="fas fa-check-circle fa-3x" style="color: #00b894;"></i>
                                            </div>
                                            <h5 style="color: #00b894; margin-bottom: 10px;">Inscription Confirmée !</h5>
                                            <p style="color: rgba(255,255,255,0.5); font-size: 14px;">
                                                Ticket : <strong>{{ $alreadyRegistered->ticket_number }}</strong>
                                            </p>
                                        @elseif($alreadyRegistered->status === 'pending')
                                            <div style="margin-bottom: 15px;">
                                                <i class="fas fa-hourglass-half fa-3x" style="color: #fdcb6e;"></i>
                                            </div>
                                            <h5 style="color: #fdcb6e; margin-bottom: 10px;">En attente de confirmation</h5>
                                            <p style="color: rgba(255,255,255,0.5); font-size: 14px;">
                                                Ticket : <strong>{{ $alreadyRegistered->ticket_number }}</strong>
                                            </p>
                                        @else
                                            <div style="margin-bottom: 15px;">
                                                <i class="fas fa-times-circle fa-3x" style="color: #d63031;"></i>
                                            </div>
                                            <h5 style="color: #d63031;">Inscription annulée</h5>
                                        @endif
                                    @else
                                        <form action="{{ route('registrations.store', $event) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-eventora w-100" style="padding: 15px; font-size: 18px;">
                                                <i class="fas fa-ticket-alt me-2"></i> S'inscrire maintenant
                                            </button>
                                        </form>
                                        <p style="color: rgba(255,255,255,0.5); font-size: 12px; margin-top: 10px;">
                                            {{ $event->remainingPlaces() }} places restantes
                                        </p>
                                    @endif
                                @elseif($event->isFull())
                                    <div style="margin-bottom: 15px;">
                                        <i class="fas fa-ban fa-3x" style="color: #d63031;"></i>
                                    </div>
                                    <h5 style="color: #d63031;">Événement complet</h5>
                                    <p style="color: rgba(255,255,255,0.5);">Plus de places disponibles</p>
                                @endif
                            @elseif(auth()->user()->isOrganizer() || auth()->user()->isAdmin())
                                @if(auth()->id() === $event->user_id || auth()->user()->isAdmin())
                                    <a href="{{ route('events.edit', $event) }}" class="btn-eventora w-100" style="padding: 15px;">
                                        <i class="fas fa-edit me-2"></i> Modifier cet événement
                                    </a>
                                @endif
                            @endif
                        @else
                            <div style="margin-bottom: 15px;">
                                <i class="fas fa-sign-in-alt fa-3x" style="color: var(--primary);"></i>
                            </div>
                            <h5 style="margin-bottom: 15px;">Connectez-vous pour vous inscrire</h5>
                            <a href="{{ route('login') }}" class="btn-eventora w-100" style="padding: 15px; margin-bottom: 10px;">
                                <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                            </a>
                            <a href="{{ route('register') }}" class="btn-eventora-outline w-100" style="padding: 15px;">
                                <i class="fas fa-user-plus me-2"></i> Créer un compte
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Retour -->
                <div class="text-center mt-3">
                    <a href="{{ route('events.index') }}" style="color: rgba(255,255,255,0.5);">
                        <i class="fas fa-arrow-left me-1"></i> Retour aux événements
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection