<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Tantara Malagasy</h2>
                <p class="text-sm text-gray-400 mt-1">Récits disponibles et déjà diffusés</p>
            </div>
            <a href="{{ route('tantaras.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Ajouter un tantara
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-8">

        <div>
            <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wide mb-3">Disponibles (non diffusés)</h3>
            <div class="bg-radio-panel border border-white/5 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-white/5 text-gray-400 uppercase text-xs tracking-wide">
                        <tr>
                            <th class="p-4 text-left">Titre</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($tantaras as $tantara)
                            <tr class="hover:bg-white/[0.03] transition">
                                <td class="p-4 font-medium text-gray-100">{{ $tantara->titre }}</td>
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <form action="{{ route('tantaras.diffuser', $tantara->id) }}" method="POST"
                                              onsubmit="return confirm('Marquer ce tantara comme diffusé aujourd\'hui ?')">
                                            @csrf
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1.5 bg-radio-green/15 text-radio-green hover:bg-radio-green hover:text-radio-dark px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                Marquer comme diffusé
                                            </button>
                                        </form>
                                        <form action="{{ route('tantaras.destroy', $tantara->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-radio-pink hover:text-red-400 text-xs font-medium transition">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="p-8 text-center text-gray-500">Aucun tantara disponible pour l'instant.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Historique (déjà diffusés)</h3>
            <div class="bg-radio-panel/60 border border-white/5 rounded-2xl overflow-hidden opacity-80">
                <table class="w-full text-sm">
                    <thead class="bg-white/5 text-gray-500 uppercase text-xs tracking-wide">
                        <tr>
                            <th class="p-4 text-left">Titre</th>
                            <th class="p-4 text-left">Date de diffusion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($tantarasDiffuses as $tantara)
                            <tr>
                                <td class="p-4 text-gray-300">{{ $tantara->titre }}</td>
                                <td class="p-4 text-gray-400">{{ \Carbon\Carbon::parse($tantara->date_diffusion)->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="p-8 text-center text-gray-500">Aucun historique pour l'instant.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>