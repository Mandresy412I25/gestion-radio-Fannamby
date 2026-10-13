<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Tableau de bord</h2>
        <p class="text-sm text-gray-400 mt-1">Vue d'ensemble de Radio Fanamby 89.1 FM</p>
    </x-slot>

    <div class="space-y-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @php
                $cards = [
                    ['label' => 'Programmes', 'value' => $stats['programmes'], 'route' => 'programmes.index', 'color' => 'green'],
                    ['label' => 'Animateurs', 'value' => $stats['animateurs'], 'route' => 'animateurs.index', 'color' => 'pink'],
                    ['label' => 'Chansons', 'value' => $stats['chansons'], 'route' => 'chansons.index', 'color' => 'green'],
                    ['label' => 'SMS auditeurs', 'value' => $stats['sms'], 'route' => 'sms.index', 'color' => 'pink'],
                    ['label' => 'Tantara disponibles', 'value' => $stats['tantaras_disponibles'], 'route' => 'tantaras.index', 'color' => 'green'],
                ];
                $colorClasses = [
                    'green' => ['text' => 'text-radio-green', 'border' => 'hover:border-radio-green/40', 'dot' => 'bg-radio-green/10'],
                    'pink' => ['text' => 'text-radio-pink', 'border' => 'hover:border-radio-pink/40', 'dot' => 'bg-radio-pink/10'],
                ];
            @endphp

            @foreach ($cards as $card)
                @php $c = $colorClasses[$card['color']]; @endphp
                <a href="{{ route($card['route']) }}"
                   class="group relative overflow-hidden bg-radio-panel border border-white/5 rounded-2xl p-5 {{ $c['border'] }} hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-lg">
                    <div class="text-xs uppercase tracking-wide text-gray-400 mb-2">{{ $card['label'] }}</div>
                    <div class="text-3xl font-extrabold {{ $c['text'] }}">{{ $card['value'] }}</div>
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 rounded-full {{ $c['dot'] }} group-hover:scale-125 transition-transform duration-300"></div>
                </a>
            @endforeach
        </div>

        <div class="bg-radio-panel border border-white/5 rounded-2xl p-6">
            <div class="text-xs uppercase tracking-wide text-gray-400 mb-2">Chanson la plus demandée</div>
            @if ($chansonPopulaire)
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xl font-bold text-gray-100">{{ $chansonPopulaire->titre ?? 'Sans titre' }}</div>
                        <div class="text-radio-pink text-sm mt-1">{{ $chansonPopulaire->nombre_demandes }} demandes</div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-radio-green/10 flex items-center justify-center text-radio-green">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-2v13M9 19a3 3 0 11-6 0 3 3 0 016 0zm12-2a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                </div>
            @else
                <div class="text-gray-500">Aucune chanson enregistrée pour le moment.</div>
            @endif
        </div>

    </div>
</x-app-layout>