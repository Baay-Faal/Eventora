<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Organisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-purple-600">{{ $totalMyEvents }}</div>
                    <div class="text-gray-500 mt-1">Mes Événements</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-green-600">{{ $publishedEvents }}</div>
                    <div class="text-gray-500 mt-1">Publiés</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-yellow-600">{{ $draftEvents }}</div>
                    <div class="text-gray-500 mt-1">Brouillons</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-blue-600">{{ $totalRegistrations }}</div>
                    <div class="text-gray-500 mt-1">Inscriptions</div>
                </div>
            </div>

            <!-- Raccourcis -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('events.create') }}" class="bg-purple-600 text-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-purple-700 transition">
                    <div class="text-2xl mb-2"><i class="fas fa-plus-circle"></i></div>
                    <div class="font-bold text-lg">Créer un Événement</div>
                    <div class="text-purple-200 text-sm">Nouveau concert, conférence, etc.</div>
                </a>
                <a href="{{ route('events.my') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-purple-600 text-2xl mb-2"><i class="fas fa-list"></i></div>
                    <div class="font-bold text-lg">Mes Événements</div>
                    <div class="text-gray-500 text-sm">Voir et gérer mes événements</div>
                </a>
                <a href="{{ route('registrations.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-green-600 text-2xl mb-2"><i class="fas fa-ticket-alt"></i></div>
                    <div class="font-bold text-lg">Inscriptions</div>
                    <div class="text-gray-500 text-sm">Confirmer les inscriptions</div>
                </a>
            </div>

            <!-- Mes Derniers Événements -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Mes Derniers Événements</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">Titre</th>
                            <th class="py-3 px-4">Catégorie</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Statut</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myEvents as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $event->title }}</td>
                                <td class="py-3 px-4">{{ $event->category->name }}</td>
                                <td class="py-3 px-4">{{ $event->date_start->format('d/m/Y') }}</td>
                                <td class="py-3 px-4">
                                    @if($event->status === 'published')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Publié</span>
                                    @elseif($event->status === 'draft')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Brouillon</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Annulé</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('events.edit', $event) }}" class="text-blue-600 hover:underline mr-2">Modifier</a>
                                    <a href="{{ route('events.show', $event) }}" class="text-green-600 hover:underline">Voir</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-3 px-4 text-center text-gray-500">
                                    Aucun événement. <a href="{{ route('events.create') }}" class="text-purple-600 hover:underline">Créer votre premier événement</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>