@extends('layouts.app-public')

@section('title', 'Accueil')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span style="display: inline-block; background: rgba(108, 92, 231, 0.2); color: var(--primary); padding: 8px 20px; border-radius: 50px; font-size: 14px; font-weight: 600; margin-bottom: 20px;">
                        🎉 La plateforme #1 de gestion d'événements
                    </span>
                    <h1>Créez, gérez et participez aux meilleurs <span>événements</span></h1>
                    <p>Eventora vous offre tous les outils nécessaires pour organiser des événements exceptionnels et permettre à votre audience de s'inscrire en toute simplicité.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('events.index') }}" class="btn-eventora">
                            <i class="fas fa-search me-2"></i>Explorer les événements
                        </a>
                        @guest
                            <a href="{{ route('register') }}" class="btn-eventora-outline">
                                <i class="fas fa-user-plus me-2"></i>Créer un compte
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="btn-eventora-outline">
                                <i class="fas fa-tachometer-alt me-2"></i>Mon Dashboard
                            </a>
                        @endguest
                    </div>

                    <!-- Trust Badges -->
                    <div class="d-flex align-items-center gap-4 mt-4 flex-wrap">
                        <div class="d-flex align-items-center">
                            <div style="display: flex;">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--dark);">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--dark); margin-left: -10px;">
                                <img src="https://randomuser.me/api/portraits/men/86.jpg" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--dark); margin-left: -10px;">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--dark); margin-left: -10px;">
                            </div>
                            <div style="margin-left: 10px;">
                                <div style="font-weight: 700; font-size: 14px;">5000+</div>
                                <div style="color: rgba(255,255,255,0.5); font-size: 12px;">Participants actifs</div>
                            </div>
                        </div>
                        <div style="width: 1px; height: 40px; background: rgba(255,255,255,0.1);"></div>
                        <div>
                            <div style="color: #fdcb6e; font-size: 14px;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div style="color: rgba(255,255,255,0.5); font-size: 12px;">4.8/5 satisfaction</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <div style="position: relative;">
                        <img src="https://illustrations.popsy.co/purple/man-with-a-laptop.svg" alt="Events" style="max-width: 85%; position: relative; z-index: 2;">
                        <!-- Floating Cards -->
                        <div style="position: absolute; top: 20px; right: 0; background: rgba(22, 33, 62, 0.9); backdrop-filter: blur(10px); padding: 15px 20px; border-radius: 15px; border: 1px solid rgba(108, 92, 231, 0.3); z-index: 3; animation: float 3s ease-in-out infinite;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 40px; height: 40px; background: rgba(0, 184, 148, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-check" style="color: #00b894;"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 600; font-size: 14px;">Inscription confirmée</div>
                                    <div style="color: rgba(255,255,255,0.5); font-size: 11px;">Il y a 2 minutes</div>
                                </div>
                            </div>
                        </div>
                        <div style="position: absolute; bottom: 40px; left: -20px; background: rgba(22, 33, 62, 0.9); backdrop-filter: blur(10px); padding: 15px 20px; border-radius: 15px; border: 1px solid rgba(108, 92, 231, 0.3); z-index: 3; animation: float 3s ease-in-out infinite 1.5s;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 40px; height: 40px; background: rgba(108, 92, 231, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-calendar-plus" style="color: var(--primary);"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 600; font-size: 14px;">Nouvel événement</div>
                                    <div style="color: rgba(255,255,255,0.5); font-size: 11px;">Concert à Dakar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Comment ça <span>marche</span> ?</h2>
                <p>Trois étapes simples pour commencer</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="position: relative; padding-top: 50px;">
                        <div style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 20px;">
                            1
                        </div>
                        <i class="fas fa-user-plus" style="font-size: 30px;"></i>
                        <h5 style="margin-top: 15px;">Créez votre compte</h5>
                        <p>Inscrivez-vous gratuitement en quelques secondes et accédez à tous les événements.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="position: relative; padding-top: 50px;">
                        <div style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 20px;">
                            2
                        </div>
                        <i class="fas fa-search" style="font-size: 30px;"></i>
                        <h5 style="margin-top: 15px;">Trouvez un événement</h5>
                        <p>Parcourez les événements disponibles par catégorie, date ou lieu.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="position: relative; padding-top: 50px;">
                        <div style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 20px;">
                            3
                        </div>
                        <i class="fas fa-ticket-alt" style="font-size: 30px;"></i>
                        <h5 style="margin-top: 15px;">Inscrivez-vous</h5>
                        <p>Réservez votre place en un clic et recevez votre ticket instantanément.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="section-padding" style="background: var(--dark-2);">
        <div class="container">
            <div class="section-title">
                <h2>Explorez par <span>Catégorie</span></h2>
                <p>Trouvez l'événement qui vous correspond</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div style="width: 70px; height: 70px; background: rgba(108, 92, 231, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-music" style="font-size: 28px;"></i>
                        </div>
                        <h5>Concert</h5>
                        <p>Événements musicaux et spectacles live</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div style="width: 70px; height: 70px; background: rgba(0, 206, 201, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 28px; color: var(--secondary);"></i>
                        </div>
                        <h5>Conférence</h5>
                        <p>Séminaires, formations et workshops</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div style="width: 70px; height: 70px; background: rgba(0, 184, 148, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-futbol" style="font-size: 28px; color: var(--success);"></i>
                        </div>
                        <h5>Sport</h5>
                        <p>Compétitions et tournois sportifs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <div style="width: 70px; height: 70px; background: rgba(253, 203, 110, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-star" style="font-size: 28px; color: var(--warning);"></i>
                        </div>
                        <h5>Festival</h5>
                        <p>Festivals culturels et artistiques</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('events.index') }}" class="btn-eventora-outline">
                    Voir toutes les catégories <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURED EVENTS -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Événements <span>Populaires</span></h2>
                <p>Les événements les plus attendus du moment</p>
            </div>
            <div class="row">
                <!-- Event Card 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400" class="card-img" alt="Concert">
                            <div style="position: absolute; top: 15px; right: 15px; background: rgba(0,184,148,0.9); padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 600;">
                                <i class="fas fa-fire me-1"></i> Populaire
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="card-category">🎵 Concert</span>
                            <h5 class="card-title">Concert de Youssou N'Dour</h5>
                            <p class="card-text">Un concert exceptionnel au Grand Théâtre de Dakar avec le roi du Mbalax.</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 15 Mars 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price">5 000 F</span>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="{{ route('events.index') }}" class="btn-eventora btn-eventora-sm" style="width: 100%; text-align: center;">
                                    Voir les détails <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Card 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400" class="card-img" alt="Conférence">
                            <div style="position: absolute; top: 15px; right: 15px; background: rgba(108,92,231,0.9); padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 600;">
                                <i class="fas fa-bolt me-1"></i> Nouveau
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="card-category">📚 Conférence</span>
                            <h5 class="card-title">Conférence Tech Dakar 2026</h5>
                            <p class="card-text">La plus grande conférence tech du Sénégal. IA, Web et Innovation.</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 20 Mai 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price">15 000 F</span>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="{{ route('events.index') }}" class="btn-eventora btn-eventora-sm" style="width: 100%; text-align: center;">
                                    Voir les détails <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Card 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=400" class="card-img" alt="Sport">
                            <div style="position: absolute; top: 15px; right: 15px; background: rgba(0,206,201,0.9); padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 600;">
                                <i class="fas fa-tag me-1"></i> Gratuit
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="card-category">⚽ Sport</span>
                            <h5 class="card-title">Tournoi de Football Inter-Quartiers</h5>
                            <p class="card-text">Grand tournoi réunissant les meilleures équipes des quartiers de Dakar.</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> 10 Avril 2026</span>
                                <span><i class="fas fa-map-marker-alt"></i> Dakar</span>
                                <span class="card-price free">Gratuit</span>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="{{ route('events.index') }}" class="btn-eventora btn-eventora-sm" style="width: 100%; text-align: center;">
                                    Voir les détails <i class="fas fa-arrow-right ms-1"></i>
                                </a>
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
                        <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-calendar-check fa-lg"></i>
                        </div>
                        <h3>150+</h3>
                        <p>Événements Créés</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-user-tie fa-lg"></i>
                        </div>
                        <h3>50+</h3>
                        <p>Organisateurs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <h3>5000+</h3>
                        <p>Participants</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                            <i class="fas fa-ticket-alt fa-lg"></i>
                        </div>
                        <h3>10K+</h3>
                        <p>Tickets Vendus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="section-padding" style="background: var(--dark-2);">
        <div class="container">
            <div class="section-title">
                <h2>Pourquoi choisir <span>Eventora</span> ?</h2>
                <p>Les avantages qui font la différence</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(108, 92, 231, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-bolt" style="color: var(--primary); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Rapide & Simple</h5>
                        <p style="margin: 0;">Créez votre événement en quelques minutes. Interface intuitive et facile à utiliser.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(0, 206, 201, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-shield-alt" style="color: var(--secondary); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Sécurisé</h5>
                        <p style="margin: 0;">Vos données sont protégées. Système d'authentification robuste et tickets uniques.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(0, 184, 148, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-mobile-alt" style="color: var(--success); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Responsive</h5>
                        <p style="margin: 0;">Accessible sur tous les appareils. Mobile, tablette et ordinateur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(253, 203, 110, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-chart-line" style="color: var(--warning); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Statistiques</h5>
                        <p style="margin: 0;">Suivez vos événements en temps réel avec des tableaux de bord détaillés.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(214, 48, 49, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-ticket-alt" style="color: var(--danger); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Tickets Uniques</h5>
                        <p style="margin: 0;">Chaque inscription génère un ticket unique avec un numéro de référence.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="width: 50px; height: 50px; background: rgba(108, 92, 231, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fas fa-users-cog" style="color: var(--primary); font-size: 20px;"></i>
                        </div>
                        <h5 style="margin-bottom: 10px;">Multi-rôles</h5>
                        <p style="margin: 0;">Admin, Organisateur et Participant. Chaque rôle a son propre espace.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Ce que disent nos <span>utilisateurs</span></h2>
                <p>Ils nous font confiance</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="color: #fdcb6e; margin-bottom: 15px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p style="font-style: italic; color: rgba(255,255,255,0.7); margin-bottom: 20px;">
                            "Eventora a transformé la façon dont j'organise mes concerts. Simple, efficace et professionnel !"
                        </p>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" style="width: 45px; height: 45px; border-radius: 50%;">
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">Moussa Fall</div>
                                <div style="color: var(--primary); font-size: 12px;">Organisateur de concerts</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="color: #fdcb6e; margin-bottom: 15px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p style="font-style: italic; color: rgba(255,255,255,0.7); margin-bottom: 20px;">
                            "Je trouve facilement les événements qui m'intéressent. L'inscription est rapide et le ticket arrive instantanément."
                        </p>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" style="width: 45px; height: 45px; border-radius: 50%;">
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">Aminata Diallo</div>
                                <div style="color: var(--primary); font-size: 12px;">Participante active</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" style="text-align: left; padding: 30px;">
                        <div style="color: #fdcb6e; margin-bottom: 15px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p style="font-style: italic; color: rgba(255,255,255,0.7); margin-bottom: 20px;">
                            "Le dashboard est incroyable. Je peux suivre mes événements et les inscriptions en temps réel."
                        </p>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <img src="https://randomuser.me/api/portraits/men/86.jpg" style="width: 45px; height: 45px; border-radius: 50%;">
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">Ibrahima Ndiaye</div>
                                <div style="color: var(--primary); font-size: 12px;">Organisateur tech</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="section-padding text-center" style="background: linear-gradient(135deg, var(--primary) 0%, var(--dark-3) 100%);">
        <div class="container">
            <div style="max-width: 600px; margin: 0 auto;">
                <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 20px;">
                    Prêt à créer votre prochain événement ?
                </h2>
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 30px; font-size: 18px;">
                    Rejoignez des milliers d'organisateurs qui font confiance à Eventora pour leurs événements.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    @guest
                        <a href="{{ route('register') }}" class="btn-eventora" style="background: white; color: var(--primary); padding: 15px 40px; font-size: 16px;">
                            <i class="fas fa-rocket me-2"></i>Commencer gratuitement
                        </a>
                        <a href="{{ route('events.index') }}" class="btn-eventora-outline" style="border-color: white; color: white; padding: 15px 40px; font-size: 16px;">
                            <i class="fas fa-search me-2"></i>Voir les événements
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-eventora" style="background: white; color: var(--primary); padding: 15px 40px; font-size: 16px;">
                            <i class="fas fa-plus me-2"></i>Créer un événement
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

@endsection