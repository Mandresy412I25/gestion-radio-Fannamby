<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Gestion des comptes</h2>
        <p class="text-sm text-gray-400 mt-1">Validation des accès des animateurs</p>
    </x-slot>

    <div class="space-y-6">

        @if (session('success'))
            <div class="bg-radio-green/10 border border-radio-green/30 text-radio-green px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-radio-panel border border-white/5 rounded-2xl p-6">
            <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wide mb-4">En attente de validation</h3>

            @forelse ($enAttente as $user)
                <div class="flex items-center justify-between gap-4 py-3 border-b border-white/5 last:border-b-0">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-10 h-10 rounded-full bg-radio-pink/15 text-radio-pink flex items-center justify-center font-bold shrink-0">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <div class="font-medium text-gray-100 truncate">{{ $user->name }}</div>
                            <div class="text-xs text-gray-400 truncate">{{ $user->email }}</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.utilisateurs.approuver', $user) }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 bg-radio-green text-radio-dark font-semibold px-3.5 py-2 rounded-lg text-sm hover:bg-radio-greenlight transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Approuver
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-gray-500 text-sm py-4">Aucune demande en attente.</div>
            @endforelse
        </div>

        <div class="bg-radio-panel border border-white/5 rounded-2xl p-6">
            <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wide mb-4">Comptes validés</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach ($valides as $user)
                    <div class="flex items-center gap-3 bg-white/[0.03] rounded-xl px-4 py-3">
                        <div class="w-9 h-9 rounded-full bg-radio-green/15 text-radio-green flex items-center justify-center font-bold text-sm shrink-0">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <div class="text-sm font-medium text-gray-200 truncate">
                                {{ $user->name }}
                                @if ($user->is_admin)
                                    <span class="ml-1 text-[10px] uppercase font-bold text-radio-pink">Admin</span>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 truncate">{{ $user->email }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>