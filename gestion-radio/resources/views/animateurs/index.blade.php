<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Liste des animateurs</h2>
                <p class="text-sm text-gray-400 mt-1">Équipe de la radio</p>
            </div>
            <a href="{{ route('animateurs.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Ajouter un animateur
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($animateurs as $animateur)
            <div class="bg-radio-panel border border-white/5 rounded-2xl p-5 hover:border-radio-pink/40 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-lg flex flex-col">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-full bg-radio-pink/15 text-radio-pink flex items-center justify-center font-bold text-lg shrink-0">
                        {{ strtoupper(substr($animateur->user->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-bold text-gray-100 truncate">{{ $animateur->user->name }}</h3>
                        <p class="text-xs text-gray-400 truncate">{{ $animateur->user->email }}</p>
                    </div>
                </div>

                <div class="text-sm text-gray-400 mb-4">
                    <span class="text-xs uppercase tracking-wide text-gray-500">Spécialité</span>
                    <div class="text-gray-200">{{ $animateur->specialite ?? 'Non renseignée' }}</div>
                </div>

                <div class="mt-auto flex items-center gap-4 pt-3 border-t border-white/5">
                    <a href="{{ route('animateurs.edit', $animateur->id) }}" class="text-sm font-medium text-radio-green hover:text-radio-greenlight transition">Modifier</a>
                    <form action="{{ route('animateurs.destroy', $animateur->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm font-medium text-radio-pink hover:text-red-400 transition">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-12">Aucun animateur pour l'instant.</div>
        @endforelse
    </div>
</x-app-layout>