@extends('layouts.app-public')

@section('title', 'Accueil')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Découvrez les meilleurs <span>événements</span> près de chez vous</h1>
                    <p>Eventora vous permet de créer, gérer et participer aux événements les plus incroyables au Sénégal.
                        Concerts, conférences, festivals et bien plus encore.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('events.index') }}" class="btn-eventora">
                            <i class="fas fa-search me-2"></i>Explorer les événements
                        </a>
                        @guest
                            <a href="{{ route('register') }}" class="btn-eventora-outline">
                                <i class="fas fa-user-plus me-2"></i>S'inscrire
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <img src="https://illustrations.popsy.co/purple/man-with-a-laptop.svg" alt="Events"
                        style="max-width: 80%;">
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Nos <span>Catégories</span></h2>
                <p>Trouvez l'événement qui vous correspond</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <i class="fas fa-music"></i>
                        <h5>Concert</h5>
                        <p>Événements musicaux</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <h5>Conférence</h5>
                        <p>Séminaires & formations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <i class="fas fa-futbol"></i>
                        <h5>Sport</h5>
                        <p>Compétitions sportives</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <i class="fas fa-star"></i>
                        <h5>Festival</h5>
                        <p>Festivals culturels</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENTS SECTION -->
    <section class="section-padding" style="background: var(--dark-2);">
        <div class="container">
            <div class="section-title">
                <h2>Événements <span>Populaires</span></h2>
                <p>Les événements les plus attendus du moment</p>
            </div>
            <div class="row">
                <!-- Event Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400" class="card-img"
                            alt="Concert">
                        <div class="card-body">
                            <span class="card-category">Concert</span>
                            <h5 class="card-title">Concert de Youssou N'Dour</h5>
                            <p class="card-text">Un concert exceptionnel au Grand Théâtre de Dakar...</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 15 Mars 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price">5 000 F</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400" class="card-img"
                            alt="Conférence">
                        <div class="card-body">
                            <span class="card-category">Conférence</span>
                            <h5 class="card-title">Conférence Tech Dakar 2025</h5>
                            <p class="card-text">La plus grande conférence tech du Sénégal...</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 20 Mai 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price">15 000 F</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=400" class="card-img"
                            alt="Sport">
                        <div class="card-body">
                            <span class="card-category">Sport</span>
                            <h5 class="card-title">Tournoi de Football</h5>
                            <p class="card-text">Grand tournoi inter-quartiers de Dakar...</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 10 Avril 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price free">Gratuit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('events.index') }}" class="btn-eventora">
                    Voir tous les événements <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <h3>150+</h3>
                        <p>Événements Créés</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Organisateurs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <h3>5000+</h3>
                        <p>Participants</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <h3>8</h3>
                        <p>Catégories</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="section-padding text-center">
        <div class="container">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 20px;">
                Prêt à créer votre <span style="color: var(--primary)">événement</span> ?
            </h2>
            <p style="color: rgba(255,255,255,0.6); margin-bottom: 30px; font-size: 18px;">
                Rejoignez Eventora et commencez à organiser vos événements dès maintenant
            </p>
            @guest
                <a href="{{ route('register') }}" class="btn-eventora">
                    <i class="fas fa-rocket me-2"></i>Commencer maintenant
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="btn-eventora">
                    <i class="fas fa-plus me-2"></i>Créer un événement
                </a>
            @endguest
        </div>
    </section>

@endsection