..............<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Grille des programmes</h2>
                <p class="text-sm text-gray-400 mt-1">Planning des émissions de la radio</p>
            </div>
            <a href="{{ route('programmes.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Ajouter un programme
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($programmes as $programme)
            <div class="bg-radio-panel border border-white/5 rounded-2xl p-5 hover:border-radio-green/40 hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-lg flex flex-col">
                <div class="flex items-start justify-between mb-3 gap-2">
                    <h3 class="font-bold text-lg text-gray-100">{{ $programme->titre }}</h3>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-radio-pink/10 text-radio-pink whitespace-nowrap">
                        {{ ucfirst(str_replace('_', ' ', $programme->type)) }}
                    </span>
                </div>

                <div class="space-y-1.5 text-sm text-gray-400 mb-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-radio-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        {{ $programme->jour_diffusion }}
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-radio-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $programme->heure_debut }} - {{ $programme->heure_fin }}
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-radio-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        {{ $programme->animateur->user->name ?? 'Non assigné' }}
                    </div>
                </div>

                <div class="mt-auto flex items-center gap-4 pt-3 border-t border-white/5">
                    <a href="{{ route('programmes.edit', $programme->id) }}" class="text-sm font-medium text-radio-green hover:text-radio-greenlight transition">Modifier</a>
                    <form action="{{ route('programmes.destroy', $programme->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm font-medium text-radio-pink hover:text-red-400 transition">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-12">Aucun programme pour l'instant.</div>
        @endforelse
    </div>
</x-app-layout>