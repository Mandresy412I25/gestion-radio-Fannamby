<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-100 tracking-tight">SMS des auditeurs</h2>
                <p class="text-sm text-gray-400 mt-1">Commentaires, idées et demandes reçus</p>
            </div>
            <a href="{{ route('sms.create') }}"
               class="inline-flex items-center gap-2 bg-radio-green text-radio-dark font-semibold px-4 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Saisir un SMS
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
                    <th class="p-4 text-left">Numéro</th>
                    <th class="p-4 text-left">Message</th>
                    <th class="p-4 text-left">Type</th>
                    <th class="p-4 text-left">Chanson liée</th>
                    <th class="p-4 text-left">Reçu le</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($sms as $item)
                    <tr class="hover:bg-white/[0.03] transition">
                        <td class="p-4 text-gray-200">{{ $item->numero_expediteur }}</td>
                        <td class="p-4 max-w-xs truncate text-gray-300">{{ $item->contenu }}</td>
                        <td class="p-4">
                            @php
                                $badges = [
                                    'commentaire' => 'bg-white/10 text-gray-300',
                                    'demande_chanson' => 'bg-radio-green/15 text-radio-green',
                                    'idee' => 'bg-radio-pink/15 text-radio-pink',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badges[$item->type] }}">
                                {{ str_replace('_', ' ', $item->type) }}
                            </span>
                        </td>
                        <td class="p-4 text-gray-300">{{ $item->chanson->titre ?? '-' }}</td>
                        <td class="p-4 text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($item->date_reception)->format('d/m/Y H:i') }}
                        </td>
                        <td class="p-4">
                            <form action="{{ route('sms.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-radio-pink hover:text-red-400 text-xs font-medium transition">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">Aucun SMS reçu pour l'instant.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>