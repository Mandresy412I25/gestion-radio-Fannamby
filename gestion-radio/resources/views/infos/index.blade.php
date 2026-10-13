<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Infos journalières</h2>
                <p class="text-sm text-gray-400 mt-1">Relais RDB — 12h00</p>
            </div>
            <a href="{{ route('infos.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Ajouter l'info du jour
            </a>
        </div>
    </x-slot>

    <div class="bg-radio-pink/10 border border-radio-pink/30 text-radio-pink px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        Rappel : le relais des infos RDB se fait chaque jour à 12h00. Cette page sert à archiver un résumé après diffusion.
    </div>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse ($infos as $info)
            <div class="bg-radio-panel border border-white/5 rounded-2xl p-5 flex justify-between items-start gap-4 hover:border-radio-green/30 transition">
                <div>
                    <p class="text-gray-400 text-xs mb-1.5">
                        {{ \Carbon\Carbon::parse($info->date)->format('d/m/Y') }} à {{ $info->heure_relais }}
                    </p>
                    <p class="text-gray-200">{{ $info->resume }}</p>
                </div>
                <form action="{{ route('infos.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-radio-pink hover:text-red-400 text-sm font-medium transition shrink-0">Supprimer</button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 text-center py-12">Aucune info enregistrée pour l'instant.</p>
        @endforelse
    </div>
</x-app-layout>