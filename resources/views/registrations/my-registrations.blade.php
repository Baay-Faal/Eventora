<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mes Inscriptions
            </h2>
            <a href="{{ route('events.index') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">
                <i class="fas fa-search me-1"></i> Explorer les événements
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Mes tickets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($registrations as $registration)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Header du ticket -->
                        <div class="p-4 border-b
                            @if($registration->status === 'confirmed') bg-green-50
                            @elseif($registration->status === 'pending') bg-yellow-50
                            @else bg-red-50
                            @endif">
                            <div class="flex justify-between items-center">
                                <span class="font-mono text-sm font-bold text-gray-600">
                                    🎫 {{ $registration->ticket_number }}
                                </span>
                                @if($registration->status === 'confirmed')
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        ✅ Confirmé
                                    </span>
                                @elseif($registration->status === 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        ⏳ En attente
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        ❌ Annulé
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $registration->event->title }}</h3>

                            <div class="space-y-2 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <i class="fas fa-folder text-purple-500 me-2 w-5"></i>
                                    {{ $registration->event->category->name }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-purple-500 me-2 w-5"></i>
                                    {{ $registration->event->date_start->format('d/m/Y') }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-purple-500 me-2 w-5"></i>
                                    {{ $registration->event->time_start }} - {{ $registration->event->time_end }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-purple-500 me-2 w-5"></i>
                                    {{ $registration->event->location }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-purple-500 me-2 w-5"></i>
                                    @if($registration->event->isFree())
                                        <span class="text-green-600 font-semibold">Gratuit</span>
                                    @else
                                        <span class="font-semibold">{{ number_format($registration->event->price, 0, ',', ' ') }} FCFA</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="mt-4 flex justify-between items-center border-t pt-3">
                                <a href="{{ route('events.show', $registration->event) }}" class="text-purple-600 hover:underline text-sm">
                                    <i class="fas fa-eye me-1"></i> Voir l'événement
                                </a>

                                @if($registration->status !== 'cancelled')
                                    <form action="{{ route('registrations.cancel', $registration) }}" method="POST" onsubmit="return confirm('Annuler cette inscription ?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">
                                            <i class="fas fa-times me-1"></i> Annuler
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12 text-center">
                            <i class="fas fa-ticket-alt text-5xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-500 mb-2">Aucune inscription</h3>
                            <p class="text-gray-400 mb-4">Vous n'êtes inscrit à aucun événement pour le moment.</p>
                            <a href="{{ route('events.index') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition inline-block">
                                <i class="fas fa-search me-1"></i> Explorer les événements
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>