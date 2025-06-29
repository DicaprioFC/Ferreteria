<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 flex">
    <!-- Sidebar -->
    <aside x-data="{ openSubmenu: null }" class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">

        <!-- Logo & Close button (mobile) -->
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                <x-app-logo class="h-8 w-auto" />
                <span class="text-xl font-semibold">Ferretería</span>
            </a>

            <!-- Close sidebar button on mobile -->
            <button @click="$dispatch('sidebar-toggle')" class="lg:hidden p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu -->
        <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-2"> <!-- Espacio vertical aumentado -->

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center px-3 py-3 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                    {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-700 dark:text-gray-300' }}">
                <!-- Icon Home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </a>

            <!-- Clientes -->
            <a href="#" class="group flex items-center px-3 py-3 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                text-gray-700 dark:text-gray-300">
                <!-- Icon Users -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20h6M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0zm0 0v4" />
                </svg>
                Clientes
            </a>

            <!-- Productos submenu -->
            <div>
                <button @click="openSubmenu === 'productos' ? openSubmenu = null : openSubmenu = 'productos'" type="button"
                    class="flex items-center justify-between w-full px-3 py-3 text-sm font-medium rounded-md hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                        text-gray-700 dark:text-gray-300">
                    <div class="flex items-center">
                        <!-- Icon Cube -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12l-8-4-8 4m0 0v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8z" />
                        </svg>
                        Gestión de Productos
                    </div>
                    <!-- Flecha más pequeña -->
                    <svg :class="{ 'rotate-180': openSubmenu === 'productos' }" class="w-3 h-3 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openSubmenu === 'productos'" x-collapse class="pl-10 mt-1 space-y-1">
                    <a href="{{ route('admin.productos.index') }}"
                        class="block px-3 py-1 rounded hover:bg-blue-500 hover:text-white text-sm text-gray-700 dark:text-gray-300">
                        Lista de Productos
                    </a>
                    <a href="{{ route('admin.productos.create') }}"
                        class="block px-3 py-1 rounded hover:bg-blue-500 hover:text-white text-sm text-gray-700 dark:text-gray-300">
                        Agregar Producto
                    </a>
                </div>
            </div>

            <!-- Proveedores -->
            <a href="{{ route('admin.proveedores.index') }}"
                class="group flex items-center px-3 py-3 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                text-gray-700 dark:text-gray-300">
                <!-- Icon Truck -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h13l-3 6H9zm-4 0a4 4 0 1 1 8 0H5zm3-8v4" />
                </svg>
                Gestión de Proveedores
            </a>

            <!-- Inventario submenu -->
            <div>
                <button @click="openSubmenu === 'inventario' ? openSubmenu = null : openSubmenu = 'inventario'" type="button"
                    class="flex items-center justify-between w-full px-3 py-3 text-sm font-medium rounded-md hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                    text-gray-700 dark:text-gray-300">
                    <div class="flex items-center">
                        <!-- Icon Inventory -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7m-9-4v4" />
                        </svg>
                        Inventario
                    </div>
                    <!-- Flecha más pequeña -->
                    <svg :class="{ 'rotate-180': openSubmenu === 'inventario' }" class="w-3 h-3 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openSubmenu === 'inventario'" x-collapse class="pl-10 mt-1 space-y-1">
                    <a href="{{ route('admin.entradas.index') }}"
                        class="block px-3 py-1 rounded hover:bg-blue-500 hover:text-white text-sm text-gray-700 dark:text-gray-300">
                        Entradas de Inventario
                    </a>
                    <a href="{{ route('admin.salidas.index') }}"
                        class="block px-3 py-1 rounded hover:bg-blue-500 hover:text-white text-sm text-gray-700 dark:text-gray-300">
                        Salidas de Inventario
                    </a>
                </div>
            </div>

            <!-- Reportes -->
            <a href="#" class="group flex items-center px-3 py-3 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500
                text-gray-700 dark:text-gray-300">
                <!-- Icon Report -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h6v6m-3-10h.01M6 6h12v12H6z" />
                </svg>
                Reportes
            </a>

        </nav>


        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>


        <!-- Spacer to push bottom content -->
        <div class="mt-auto px-4 py-4 border-t border-gray-200 dark:border-gray-700">

            <a href="https://github.com/DicaprioFC/Ferreteria" target="_blank" class="block text-sm hover:underline text-gray-600 dark:text-gray-400 mb-2">
                Repositorio GitHub
            </a>
            <a href="https://github.com/DicaprioFC/Ferreteria" target="_blank" class="block text-sm hover:underline text-gray-600 dark:text-gray-400">
                Documentación
            </a>

        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>

    @fluxScripts
</body>

</html>