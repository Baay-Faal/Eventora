@extends('layouts.app-public')

@section('title', 'Événements')

@section('content')
<section class="section-padding" style="padding-top: 120px;">
    <div class="container">
        <div class="section-title">
            <h2>Tous les <span>Événements</span></h2>
            <p>Découvrez et participez aux meilleurs événements</p>
        </div>

        <div class="row">
            @forelse($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img" alt="{{ $event->title }}">
                        @else
                            <div class="card-img d-flex align-items-center justify-content-center" style="height: 200px; background: #16213e;">
                                <i class="fas fa-calendar-alt fa-3x" style="color: #6c5ce7;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="card-category">{{ $event->category->name }}</span>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 80) }}</p>
                            <div class="card-info">
                                <span><i class="fas fa-calendar"></i> {{ $event->date_start->format('d M Y') }}</span>
                                <span><i class="fas fa-map-marker-alt"></i> {{ Str::limit($event->location, 15) }}</span>
                                @if($event->isFree())
                                    <span class="card-price free">Gratuit</span>
                                @else
                                    <span class="card-price">{{ number_format($event->price, 0, ',', ' ') }} F</span>
                                @endif
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('events.show', $event) }}" class="btn-eventora btn-eventora-sm w-100 text-center">
                                    Voir les détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p style="color: rgba(255,255,255,0.6);">Aucun événement disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $events->links() }}
        </div>
    </div>
</section>
@endsection