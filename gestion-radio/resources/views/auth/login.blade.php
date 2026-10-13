<x-guest-layout>
    <h2 class="text-xl font-bold text-gray-100 mb-1">Connexion</h2>
    <p class="text-sm text-gray-400 mb-6">Accédez à votre espace de gestion</p>

    <x-auth-session-status class="mb-4 text-radio-green" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 placeholder-gray-500 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1.5">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full bg-radio-dark border border-white/10 rounded-xl px-4 py-2.5 text-gray-100 focus:border-radio-green focus:ring-1 focus:ring-radio-green outline-none transition">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-gray-400">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-radio-dark text-radio-green focus:ring-radio-green">
                Se souvenir de moi
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-radio-green hover:text-radio-greenlight underline">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-radio-green text-radio-dark font-semibold px-5 py-2.5 rounded-xl hover:bg-radio-greenlight transition">
            Se connecter
        </button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-400 pt-2">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-radio-pink hover:text-radio-pinkdark underline font-medium">
                    Inscrivez-vous
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>