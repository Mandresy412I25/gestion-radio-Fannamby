<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Ajouter un programme</h2>
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

        <form action="{{ route('programmes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Titre</label>
                <input type="text" name="titre" value="{{ old('titre') }}"
                       class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Jour de diffusion</label>
                <select name="jour_diffusion"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select>
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Heure de début</label>
                    <input type="time" name="heure_debut"
                           class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Heure de fin</label>
                    <input type="time" name="heure_fin"
                           class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Type</label>
                <select name="type"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="normal">Normal</option>
                    <option value="relais_rdb">Relais RDB</option>
                    <option value="tantara">Tantara</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Animateur</label>
                <select name="animateur_id"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="">-- Aucun --</option>
                    @foreach ($animateurs as $animateur)
                        <option value="{{ $animateur->id }}">{{ $animateur->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-radio-green text-radio-dark font-semibold px-5 py-2.5 rounded-xl hover:bg-radio-greenlight transition">Enregistrer</button>
                <a href="{{ route('programmes.index') }}" class="text-gray-400 hover:text-gray-200 px-4 py-2.5 transition">Annuler</a>
            </div>
        </form>
    </div>
</x-app-layout>