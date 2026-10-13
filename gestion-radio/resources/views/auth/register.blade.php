<x-guest-layout>
    <h2 class="text-xl font-bold text-gray-100 mb-1">Créer un compte</h2>
    <p class="text-sm text-gray-400 mb-6">Votre compte sera activé après validation par un administrateur</p>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Nom complet</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
                class="w-full bg-radio-green text-radio-dark font-semibold px-5 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
            S'inscrire
        </button>

        <p class="text-center text-sm text-gray-400 pt-2">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-radio-pink hover:text-radio-pinkdark underline font-medium">
                Connectez-vous
            </a>
        </p>
    </form>
</x-guest-layout>