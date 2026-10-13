<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Chansons demandées</h2>
                <p class="text-sm text-gray-400 mt-1">Suivi des demandes des auditeurs</p>
            </div>
            <a href="{{ route('chansons.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Ajouter une chanson
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-radio-panel border border-white/5 rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-white/5 text-gray-400 uppercase text-xs tracking-wide">
                <tr>
                    <th class="p-4 text-left">Titre</th>
                    <th class="p-4 text-left">Lien</th>
                    <th class="p-4 text-left">Demandes</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($chansons as $chanson)
                    <tr class="hover:bg-white/[0.03] transition">
                        <td class="p-4 font-medium text-gray-100">{{ $chanson->titre }}</td>
                        <td class="p-4">
                            @if ($chanson->lien_source)
                                <a href="{{ $chanson->lien_source }}" target="_blank" class="text-radio-green hover:text-radio-greenlight underline">Écouter</a>
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center justify-center min-w-[2.5rem] bg-radio-pink/10 text-radio-pink font-bold px-2.5 py-1 rounded-full">
                                {{ $chanson->nombre_demandes }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <form action="{{ route('chansons.incrementer', $chanson->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 bg-radio-green/15 text-radio-green hover:bg-radio-green hover:text-radio-dark px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                                        Jouer / Demander
                                    </button>
                                </form>
                                <form action="{{ route('chansons.destroy', $chanson->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-radio-pink hover:text-red-400 text-xs font-medium transition">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500">Aucune chanson pour l'instant.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>