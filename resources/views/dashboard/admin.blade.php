<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
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

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-purple-600">{{ $totalEvents }}</div>
                    <div class="text-gray-500 mt-1">Événements</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-blue-600">{{ $totalCategories }}</div>
                    <div class="text-gray-500 mt-1">Catégories</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-green-600">{{ $totalUsers }}</div>
                    <div class="text-gray-500 mt-1">Utilisateurs</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-orange-600">{{ $totalRegistrations }}</div>
                    <div class="text-gray-500 mt-1">Inscriptions</div>
                </div>
            </div>

            <!-- Raccourcis -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('categories.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-purple-600 text-2xl mb-2"><i class="fas fa-folder"></i></div>
                    <div class="font-bold text-lg">Catégories</div>
                    <div class="text-gray-500 text-sm">Gérer les catégories</div>
                </a>
                <a href="{{ route('events.my') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-blue-600 text-2xl mb-2"><i class="fas fa-calendar"></i></div>
                    <div class="font-bold text-lg">Événements</div>
                    <div class="text-gray-500 text-sm">Gérer les événements</div>
                </a>
                <a href="{{ route('users.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-orange-600 text-2xl mb-2"><i class="fas fa-user-tie"></i></div>
                    <div class="font-bold text-lg">Organisateurs</div>
                    <div class="text-gray-500 text-sm">Gérer les organisateurs</div>
                </a>
                <a href="{{ route('registrations.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-green-600 text-2xl mb-2"><i class="fas fa-users"></i></div>
                    <div class="font-bold text-lg">Inscriptions</div>
                    <div class="text-gray-500 text-sm">Gérer les inscriptions</div>
                </a>
            </div>

            <!-- Derniers Événements -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-8">
                <h3 class="text-lg font-bold mb-4">Derniers Événements</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">Titre</th>
                            <th class="py-3 px-4">Organisateur</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentEvents as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $event->title }}</td>
                                <td class="py-3 px-4">{{ $event->user->name }}</td>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500">Aucun événement</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Dernières Inscriptions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Dernières Inscriptions</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">Participant</th>
                            <th class="py-3 px-4">Événement</th>
                            <th class="py-3 px-4">Ticket</th>
                            <th class="py-3 px-4">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentRegistrations as $registration)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $registration->user->name }}</td>
                                <td class="py-3 px-4">{{ $registration->event->title }}</td>
                                <td class="py-3 px-4">{{ $registration->ticket_number }}</td>
                                <td class="py-3 px-4">
                                    @if($registration->status === 'confirmed')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Confirmé</span>
                                    @elseif($registration->status === 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">En attente</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Annulé</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500">Aucune inscription</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>