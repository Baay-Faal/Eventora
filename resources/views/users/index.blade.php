<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Organisateurs
            </h2>
            <a href="{{ route('users.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">
                <i class="fas fa-plus me-1"></i> Nouvel Organisateur
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">#</th>
                            <th class="py-3 px-4">Nom</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Téléphone</th>
                            <th class="py-3 px-4">Événements</th>
                            <th class="py-3 px-4">Date d'inscription</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($organizers as $organizer)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-semibold">{{ $organizer->name }}</td>
                                <td class="py-3 px-4">{{ $organizer->email }}</td>
                                <td class="py-3 px-4">{{ $organizer->phone ?? '-' }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">
                                        {{ $organizer->events->count() }} événement(s)
                                    </span>
                                </td>
                                <td class="py-3 px-4">{{ $organizer->created_at->format('d/m/Y') }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('users.edit', $organizer) }}" class="text-blue-600 hover:underline text-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('users.destroy', $organizer) }}" method="POST" onsubmit="return confirm('Supprimer cet organisateur ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-3 px-4 text-center text-gray-500">
                                    Aucun organisateur. <a href="{{ route('users.create') }}" class="text-purple-600 hover:underline">Créer le premier</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>