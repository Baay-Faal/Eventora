<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Inscriptions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats rapides -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-purple-600">{{ $registrations->total() }}</div>
                    <div class="text-gray-500 mt-1">Total Inscriptions</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-green-600">
                        {{ $registrations->where('status', 'confirmed')->count() }}
                    </div>
                    <div class="text-gray-500 mt-1">Confirmées</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-3xl font-bold text-yellow-600">
                        {{ $registrations->where('status', 'pending')->count() }}
                    </div>
                    <div class="text-gray-500 mt-1">En attente</div>
                </div>
            </div>

            <!-- Tableau -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">#</th>
                            <th class="py-3 px-4">Participant</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Événement</th>
                            <th class="py-3 px-4">Ticket</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Statut</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrations as $registration)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-semibold">{{ $registration->user->name }}</td>
                                <td class="py-3 px-4 text-sm">{{ $registration->user->email }}</td>
                                <td class="py-3 px-4">{{ $registration->event->title }}</td>
                                <td class="py-3 px-4 font-mono text-sm">{{ $registration->ticket_number }}</td>
                                <td class="py-3 px-4 text-sm">{{ $registration->created_at->format('d/m/Y H:i') }}</td>
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
                                    <div class="flex space-x-2">
                                        @if($registration->status === 'pending')
                                            <form action="{{ route('registrations.confirm', $registration) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 hover:underline text-sm">
                                                    <i class="fas fa-check"></i> Confirmer
                                                </button>
                                            </form>
                                        @endif

                                        @if($registration->status !== 'cancelled')
                                            <form action="{{ route('registrations.cancel', $registration) }}" method="POST" onsubmit="return confirm('Annuler cette inscription ?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                                    <i class="fas fa-times"></i> Annuler
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-3 px-4 text-center text-gray-500">
                                    Aucune inscription pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $registrations->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>