<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Eventora') - Gestion d\'Événements</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-eventora">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Event<span>ora</span></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">Événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    @guest
                        <a href="{{ route('login') }}" class="btn-eventora-outline btn-eventora-sm me-2">Connexion</a>
                        <a href="{{ route('register') }}" class="btn-eventora btn-eventora-sm">Inscription</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-eventora btn-eventora-sm">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Event<span style="color: var(--white)">ora</span></h5>
                    <p>La plateforme de gestion d'événements au Sénégal. Créez, gérez et participez aux meilleurs événements.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Liens</h5>
                    <ul>
                        <li class="mb-2"><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="mb-2"><a href="#">Événements</a></li>
                        <li class="mb-2"><a href="#">Catégories</a></li>
                        <li class="mb-2"><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Catégories</h5>
                    <ul>
                        <li class="mb-2"><a href="#">Concert</a></li>
                        <li class="mb-2"><a href="#">Conférence</a></li>
                        <li class="mb-2"><a href="#">Sport</a></li>
                        <li class="mb-2"><a href="#">Festival</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Contact</h5>
                    <ul>
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: var(--primary)"></i> Dakar, Sénégal</li>
                        <li class="mb-2"><i class="fas fa-phone me-2" style="color: var(--primary)"></i> +221 77 000 00 00</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2" style="color: var(--primary)"></i> contact@eventora.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Eventora. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>