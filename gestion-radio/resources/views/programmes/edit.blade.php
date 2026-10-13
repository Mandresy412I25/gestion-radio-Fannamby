<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le programme</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-6">Modifier le programme</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('programmes.update', $programme->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium mb-1">Titre</label>
                <input type="text" name="titre" value="{{ old('titre', $programme->titre) }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Jour de diffusion</label>
                <select name="jour_diffusion" class="w-full border rounded p-2">
                    @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $jour)
                        <option value="{{ $jour }}" {{ $programme->jour_diffusion == $jour ? 'selected' : '' }}>
                            {{ $jour }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block font-medium mb-1">Heure de début</label>
                    <input type="time" name="heure_debut" value="{{ $programme->heure_debut }}" class="w-full border rounded p-2">
                </div>
                <div class="flex-1">
                    <label class="block font-medium mb-1">Heure de fin</label>
                    <input type="time" name="heure_fin" value="{{ $programme->heure_fin }}" class="w-full border rounded p-2">
                </div>
            </div>

            <div>
                <label class="block font-medium mb-1">Type</label>
                <select name="type" class="w-full border rounded p-2">
                    @foreach (['normal' => 'Normal', 'relais_rdb' => 'Relais RDB', 'tantara' => 'Tantara'] as $value => $label)
                        <option value="{{ $value }}" {{ $programme->type == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Animateur</label>
                <select name="animateur_id" class="w-full border rounded p-2">
                    <option value="">-- Aucun --</option>
                    @foreach ($animateurs as $animateur)
                        <option value="{{ $animateur->id }}" {{ $programme->animateur_id == $animateur->id ? 'selected' : '' }}>
                            {{ $animateur->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-3 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
                <a href="{{ route('programmes.index') }}" class="text-gray-600 px-4 py-2">Annuler</a>
            </div>
        </form>
    </div>

</body>
</html>