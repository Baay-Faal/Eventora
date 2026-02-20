<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon Dashboard
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-purple-600">{{ $totalRegistrations }}</div>
                    <div class="text-gray-500 mt-1">Mes Inscriptions</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-green-600">{{ $confirmedRegistrations }}</div>
                    <div class="text-gray-500 mt-1">Confirmées</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-yellow-600">{{ $pendingRegistrations }}</div>
                    <div class="text-gray-500 mt-1">En attente</div>
                </div>
            </div>

            <!-- Raccourcis -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{ route('events.index') }}" class="bg-purple-600 text-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-purple-700 transition">
                    <div class="text-2xl mb-2"><i class="fas fa-search"></i></div>
                    <div class="font-bold text-lg">Explorer les Événements</div>
                    <div class="text-purple-200 text-sm">Découvrir et s'inscrire</div>
                </a>
                <a href="{{ route('registrations.my') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition">
                    <div class="text-purple-600 text-2xl mb-2"><i class="fas fa-ticket-alt"></i></div>
                    <div class="font-bold text-lg">Mes Inscriptions</div>
                    <div class="text-gray-500 text-sm">Voir mes tickets</div>
                </a>
            </div>

            <!-- Mes Inscriptions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Mes Dernières Inscriptions</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">Événement</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Ticket</th>
                            <th class="py-3 px-4">Statut</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myRegistrations as $registration)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $registration->event->title }}</td>
                                <td class="py-3 px-4">{{ $registration->event->date_start->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 font-mono text-sm">{{ $registration->ticket_number }}</td>
                                <td class="py-3 px-4">
                                    @if($registration->status === 'confirmed')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Confirmé</span>
                                    @elseif($registration->status === 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">En attente</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Annulé</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    @if($registration->status !== 'cancelled')
                                        <form action="{{ route('registrations.cancel', $registration) }}" method="POST" onsubmit="return confirm('Annuler cette inscription ?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-600 hover:underline text-sm">Annuler</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-3 px-4 text-center text-gray-500">
                                    Aucune inscription. <a href="{{ route('events.index') }}" class="text-purple-600 hover:underline">Explorer les événements</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>