<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Catégories
            </h2>
            <a href="{{ route('categories.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">
                <i class="fas fa-plus me-1"></i> Nouvelle Catégorie
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
                            <th class="py-3 px-4">Nom</th>
                            <th class="py-3 px-4">Slug</th>
                            <th class="py-3 px-4">Description</th>
                            <th class="py-3 px-4">Événements</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-semibold">{{ $category->name }}</td>
                                <td class="py-3 px-4 text-gray-500 text-sm">{{ $category->slug }}</td>
                                <td class="py-3 px-4 text-sm">{{ Str::limit($category->description, 50) }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">
                                        {{ $category->events_count }} événement(s)
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:underline text-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
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
                                <td colspan="6" class="py-3 px-4 text-center text-gray-500">
                                    Aucune catégorie. <a href="{{ route('categories.create') }}" class="text-purple-600 hover:underline">Créer la première</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>