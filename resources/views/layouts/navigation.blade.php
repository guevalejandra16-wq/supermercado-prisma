<nav
    x-data="{ open: false }"
    class="bg-white border-b border-gray-200"
>
    <!-- Barra superior -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3"
                >
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13m-9-4v4m6-4v4M9 21h.01M17 21h.01"
                            />
                        </svg>
                    </div>

                    <div class="hidden sm:block">
                        <div class="font-bold text-gray-900">
                            Prisma
                        </div>
                        <div class="text-xs text-gray-500">
                            Supermercado
                        </div>
                    </div>
                </a>
            </div>

            <!-- Botón abrir menú -->
            <button
                @click="open = !open"
                type="button"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 transition"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

                <span class="hidden sm:inline">
                    Menú
                </span>
            </button>

            <!-- Usuario -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:block text-right">
                    <div class="text-sm font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Usuario
                    </div>
                </div>

                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>

        </div>
    </div>

    <!-- MENÚ DESPLEGABLE -->
    <div
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="border-t border-gray-200 bg-white shadow-lg"
        style="display: none;"
    >

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">

                <!-- Dashboard -->
                <a
                    href="{{ route('dashboard') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl
                    {{ request()->routeIs('dashboard')
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-50 text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}
                    transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 12l9-9 9 9M5 10v10h14V10M9 20v-6h6v6"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Dashboard
                    </span>
                </a>

                <!-- Productos -->
                <a
                    href="{{ route('productos.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Productos
                    </span>
                </a>

                <!-- Clientes -->
                <a
                    href="{{ route('clientes.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-green-50 hover:text-green-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-5a4 4 0 100-8 4 4 0 000 8zm5 0a3 3 0 100-6 3 3 0 000 6z"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Clientes
                    </span>
                </a>

                <!-- Proveedores -->
                <a
                    href="{{ route('proveedores.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 9h.01M15 9h.01M9 12h.01M15 12h.01"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Proveedores
                    </span>
                </a>

                <!-- Inventario -->
                <a
                    href="{{ route('inventario.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 7h16M4 12h16M4 17h16M7 4v16M17 4v16"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Inventario
                    </span>
                </a>

                <!-- Categorías -->
                <a
                    href="{{ route('categorias.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.59 13.41L11 3.82V3H4v7h.82l9.59 9.59a2 2 0 002.82 0l3.36-3.36a2 2 0 000-2.82zM7 7h.01"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Categorías
                    </span>
                </a>

                <!-- Compras -->
                <a
                    href="{{ route('compras.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7 4h10v16H7zM9 8h6M9 12h6M9 16h4"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Compras
                    </span>
                </a>

                <!-- Ventas -->
                <a
                    href="{{ route('ventas.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-green-50 hover:text-green-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13m-9-4v4m6-4v4M9 21h.01M17 21h.01"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Ventas
                    </span>
                </a>

                <!-- Facturas -->
                <a
                    href="{{ route('facturas.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 3h12v18l-3-2-3 2-3-2-3 2V3zM9 8h6M9 12h6M9 16h3"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Facturas
                    </span>
                </a>

                <!-- Usuarios -->
                <a
                    href="{{ route('usuarios.index') }}"
                    class="flex flex-col items-center justify-center gap-2 p-4 rounded-xl bg-gray-50 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm8 0a3 3 0 100-6 3 3 0 000 6zm0 4h2a4 4 0 014 4v2"
                        />
                    </svg>

                    <span class="text-sm font-medium">
                        Usuarios
                    </span>
                </a>

            </div>

            <!-- Opciones de usuario -->
            <div class="mt-5 pt-5 border-t border-gray-200 flex flex-wrap gap-3">

                <a
                    href="{{ route('profile.edit') }}"
                    class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition"
                >
                    Perfil
                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >
                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-lg text-sm font-medium bg-red-50 text-red-600 hover:bg-red-100 transition"
                    >
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>