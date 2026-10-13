<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-100 tracking-tight">Saisir un SMS reçu</h2>
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

        <form action="{{ route('sms.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Numéro de l'auditeur</label>
                <input type="text" name="numero_expediteur" value="{{ old('numero_expediteur') }}" placeholder="Ex: 034 xx xxx xx"
                       class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Contenu du message</label>
                <textarea name="contenu" rows="3"
                          class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">{{ old('contenu') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Type</label>
                <select name="type" id="type" onchange="toggleChanson()"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="commentaire">Commentaire</option>
                    <option value="demande_chanson">Demande de chanson</option>
                    <option value="idee">Idée</option>
                </select>
            </div>

            <div id="chanson-field" style="display:none;">
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Chanson demandée (si applicable)</label>
                <select name="chanson_id"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="">-- Sélectionner --</option>
                    @foreach ($chansons as $chanson)
                        <option value="{{ $chanson->id }}">{{ $chanson->titre }}</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-2">
                    Si la chanson n'existe pas encore, <a href="{{ route('chansons.create') }}" class="text-radio-green underline hover:text-radio-greenlight">ajoute-la d'abord ici</a>.
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Émission concernée (optionnel)</label>
                <select name="emission_id"
                        class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
                    <option value="">-- Aucune --</option>
                    @foreach ($emissions as $emission)
                        <option value="{{ $emission->id }}">
                            {{ $emission->programme->titre ?? 'Programme' }} - {{ $emission->date_diffusion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-radio-green text-radio-dark font-semibold px-5 py-2.5 rounded-xl hover:bg-radio-greenlight transition">Enregistrer</button>
                <a href="{{ route('sms.index') }}" class="text-gray-400 hover:text-gray-200 px-4 py-2.5 transition">Annuler</a>
            </div>
        </form>
    </div>

    <script>
        function toggleChanson() {
            const type = document.getElementById('type').value;
            const field = document.getElementById('chanson-field');
            field.style.display = (type === 'demande_chanson') ? 'block' : 'none';
        }
    </script>
</x-app-layout>