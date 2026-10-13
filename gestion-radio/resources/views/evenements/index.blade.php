<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Événements & Directs</h2>
                <p class="text-sm text-gray-400 mt-1">Annonces et diffusions spéciales</p>
            </div>
            <a href="{{ route('evenements.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Publier un événement
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse ($evenements as $evenement)
            <div class="bg-radio-panel border border-white/5 rounded-2xl p-5 flex justify-between items-start gap-4 hover:border-radio-pink/30 transition">
                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-radio-pink/10 text-radio-pink flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-100">{{ $evenement->titre }}</h3>
                        <p class="text-gray-400 text-sm mt-0.5">
                            {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}
                        </p>
                        @if ($evenement->lien_diffusion)
                            <a href="{{ $evenement->lien_diffusion }}" target="_blank" class="text-radio-green hover:text-radio-greenlight underline text-sm mt-1 inline-block">
                                Voir le direct / la publication
                            </a>
                        @endif
                    </div>
                </div>
                <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-radio-pink hover:text-red-400 text-sm font-medium transition">Supprimer</button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 text-center py-12">Aucun événement publié pour l'instant.</p>
        @endforelse
    </div>
</x-app-layout>