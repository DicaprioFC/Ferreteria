<x-layouts.app :title="__('Dashboard')">
 <p>ERES EL ADMIN EL ALFA Y EL OMEGA EL PRINCIPIO Y EL FIN
    
 </p>
 <div class="p-6">
        <h2 class="text-xl font-bold mb-6">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-card color="bg-pink-600" icon="👤" title="Clientes" :value="$clientes" />
            <x-card color="bg-orange-500" icon="🧑‍🤝‍🧑" title="Proveedores" :value="$proveedores" />
            <x-card color="bg-purple-600" icon="📦" title="Productos" :value="$productos" />
            <x-card color="bg-gray-600" icon="🧾" title="Facturas" :value="$facturas" />
            <x-card color="bg-blue-700" icon="👜" title="Existencia Total" :value="$existencia_total" />
            <x-card color="bg-pink-500" icon="🚚" title="Existencia Vendida" :value="$existencia_vendida" />
            <x-card color="bg-sky-500" icon="📊" title="Existencia Actual" :value="$existencia_actual" />
            <x-card color="bg-red-500" icon="💳" title="Importe Vendido" :value="'$' . $importe_vendido" />
            <x-card color="bg-green-500" icon="💰" title="Importe Pagado" :value="'$' . $importe_pagado" />
            <x-card color="bg-red-600" icon="🧾" title="Importe Restante" :value="'$' . $importe_restante" />
            <x-card color="bg-yellow-700" icon="📈" title="Beneficio Bruto" :value="'$' . $beneficio_bruto" />
            <x-card color="bg-teal-500" icon="💵" title="Beneficio Neto" :value="'$' . $beneficio_neto" />
        </div>
    </div>
    
    
</x-layouts.app>
