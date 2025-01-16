<div class="flex flex-col min-h-screen bg-gray-800 text-white fixed md:w-64 w-0 md:block" id="sidebar">
    <!-- Brand Section -->
    <div class="flex items-center justify-between h-16 bg-gray-600 px-4 border-solid"> <!-- Azul Claro -->
        <span class="text-lg font-bold text-white">{{ config('app.name') }}</span>
        <a href="/dashboard">
            <img src="{{ asset('images/game-admin-logo.png') }}" alt="Game-Admin Logo" class="h-12 rounded-2xl">
        </a>
        <!-- Botón hamburguesa en pantallas móviles -->
        <button class="text-white md:hidden" id="hamburgerButton">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-2 space-y-1 mt-2">
        <a href="#" class="block px-4 py-2 rounded-md text-white hover:bg-[#F9A826] hover:text-white"> <!-- Naranja Brillante -->
            <i class="fas fa-users mr-2"></i> Usuarios
        </a>
        <a href="#" class="block px-4 py-2 rounded-md text-white hover:bg-[#F9A826] hover:text-white"> <!-- Naranja Brillante -->
            <i class="fas fa-home mr-2"></i> Roles
        </a>
        <a href="#" class="block px-4 py-2 rounded-md text-white hover:bg-[#F9A826] hover:text-white"> <!-- Naranja Brillante -->
            <i class="fas fa-home mr-2"></i> Permisos
        </a>
        <a href="#" class="block px-4 py-2 rounded-md text-white hover:bg-[#F9A826] hover:text-white"> <!-- Naranja Brillante -->
            <i class="fas fa-home mr-2"></i> videojuegos
        </a>
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded-md text-white hover:bg-[#F9A826] hover:text-white"> <!-- Naranja Brillante -->
            <i class="fas fa-cogs mr-2"></i> Mi perfil
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a 
                href="#" 
                class="block px-4 py-2 rounded-md text-white hover:bg-[#F44336] hover:text-white" 
                href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();"
            > <!-- Rojo -->
                <i class="fas fa-sign-out-alt mr-2"></i> Salir
            </a>
        </form>
    </nav>
</div>
