<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mes Événements
            </h2>
            <a href="{{ route('events.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">
                <i class="fas fa-plus me-1"></i> Nouvel Événement
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4">#</th>
                            <th class="py-3 px-4">Titre</th>
                            <th class="py-3 px-4">Catégorie</th>
                            <th class="py-3 px-4">Lieu</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Prix</th>
                            <th class="py-3 px-4">Statut</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-semibold">{{ $event->title }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">
                                        {{ $event->category->name }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-sm">{{ $event->location }}</td>
                                <td class="py-3 px-4 text-sm">{{ $event->date_start->format('d/m/Y') }}</td>
                                <td class="py-3 px-4">
                                    @if($event->price == 0)
                                        <span class="text-green-600 font-semibold">Gratuit</span>
                                    @else
                                        <span class="font-semibold">{{ number_format($event->price, 0, ',', ' ') }} F</span>
                                    @endif
                                </td>
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
                                    <div class="flex space-x-2">
                                        <a href="{{ route('events.show', $event) }}" class="text-green-600 hover:underline text-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('events.edit', $event) }}" class="text-blue-600 hover:underline text-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Supprimer cet événement ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-3 px-4 text-center text-gray-500">
                                    Aucun événement. <a href="{{ route('events.create') }}" class="text-purple-600 hover:underline">Créer le premier</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>