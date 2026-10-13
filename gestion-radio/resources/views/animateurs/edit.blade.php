<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Modifier l'animateur</h2>
    </x-slot>

    <div class="max-w-xl bg-radio-panel border border-white/5 rounded-2xl p-6">

        @if ($errors->any())
            <div class="bg-radio-pink/10 border border-radio-pink/30 text-radio-pink p-4 rounded-xl mb-5">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('animateurs.update', $animateur->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Nom complet</label>
                <input type="text" name="name" value="{{ old('name', $animateur->user->name) }}"
                       class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $animateur->user->email) }}"
                       class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Spécialité</label>
                <input type="text" name="specialite" value="{{ old('specialite', $animateur->specialite) }}"
                       class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-radio-green text-radio-dark font-semibold px-5 py-2.5 rounded-xl hover:bg-radio-greenlight transition">Mettre à jour</button>
                <a href="{{ route('animateurs.index') }}" class="text-gray-400 hover:text-gray-200 px-4 py-2.5 transition">Annuler</a>
            </div>
        </form>
    </div>
</x-app-layout>