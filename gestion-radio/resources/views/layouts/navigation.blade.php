<aside x-cloak
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
       class="fixed inset-y-0 left-0 z-40 w-64 bg-radio-panel border-r border-white/5 transform transition-transform duration-200 ease-in-out lg:translate-x-0 flex flex-col">

    <div class="h-20 flex items-center justify-center border-b border-white/5 px-4">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center">
            <span class="text-radio-green font-extrabold text-xl tracking-wide leading-none">89.1 FM</span>
            <span class="text-radio-pink font-black text-lg tracking-widest leading-none">FANAMBI</span>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">

        @php
            $links = [
                ['route' => 'dashboard', 'label' => 'Tableau de bord', 'pattern' => 'dashboard', 'icon' => 'home'],
                ['route' => 'programmes.index', 'label' => 'Programmes', 'pattern' => 'programmes.*', 'icon' => 'calendar'],
                ['route' => 'animateurs.index', 'label' => 'Animateurs', 'pattern' => 'animateurs.*', 'icon' => 'users'],
                ['route' => 'chansons.index', 'label' => 'Chansons', 'pattern' => 'chansons.*', 'icon' => 'music'],
                ['route' => 'tantaras.index', 'label' => 'Tantara', 'pattern' => 'tantaras.*', 'icon' => 'book'],
                ['route' => 'sms.index', 'label' => 'SMS', 'pattern' => 'sms.*', 'icon' => 'chat'],
                ['route' => 'evenements.index', 'label' => 'Événements', 'pattern' => 'evenements.*', 'icon' => 'star'],
                ['route' => 'infos.index', 'label' => 'Infos', 'pattern' => 'infos.*', 'icon' => 'info'],
            ];
        @endphp

        @foreach ($links as $link)
            @php $active = request()->routeIs($link['pattern']); @endphp
            <a href="{{ route($link['route']) }}"
               class="group flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                      {{ $active ? 'bg-radio-green/15 text-radio-green shadow-inner' : 'text-gray-300 hover:bg-white/5 hover:text-radio-pink' }}">

                @switch($link['icon'])
                    @case('home')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h4v-6h6v6h4a1 1 0 001-1V10" /></svg>
                        @break
                    @case('calendar')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        @break
                    @case('users')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-1.13-7.84" /></svg>
                        @break
                    @case('music')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-2v13M9 19a3 3 0 11-6 0 3 3 0 016 0zm12-2a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        @break
                    @case('book')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        @break
                    @case('chat')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.5 0-2.9-.32-4.14-.88L3 20l1.12-3.36A7.94 7.94 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                        @break
                    @case('star')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.914c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.176 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                        @break
                    @case('info')
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        @break
                @endswitch

                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach

        @if (Auth::user()->is_admin)
            <a href="{{ route('admin.utilisateurs.index') }}"
               class="group flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('admin.*') ? 'bg-radio-pink/15 text-radio-pink shadow-inner' : 'text-gray-300 hover:bg-white/5 hover:text-radio-pink' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                <span>Comptes</span>
            </a>
        @endif
    </nav>

    <div class="border-t border-white/5 p-4">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-9 h-9 rounded-full bg-radio-green/20 text-radio-green flex items-center justify-center font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <div class="text-sm font-semibold text-gray-100 truncate">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('profile.edit') }}"
               class="flex-1 text-center text-xs font-medium py-2 rounded-lg bg-white/5 text-gray-300 hover:bg-white/10 transition">
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit"
                        class="w-full text-center text-xs font-medium py-2 rounded-lg bg-radio-pink/10 text-radio-pink hover:bg-radio-pink/20 transition">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</aside>