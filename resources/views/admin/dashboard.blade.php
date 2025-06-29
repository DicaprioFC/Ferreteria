<x-layouts.app :title="__('Dashboard')">
    <div class="p-6">
        <!-- Título principal -->
        <div class="mb-8 text-center">
            <h1 style="font-size: 3rem; font-weight: bold; color: #fb923c; text-shadow: 2px 2px 4px rgba(0,0,0,0.4); text-align: center;">
                ERES EL ADMIN, EL ALFA Y EL OMEGA, EL PRINCIPIO Y EL FIN
            </h1>


        </div>

        <!-- Caja principal -->
        <div style="background-color: #111827; padding: 2rem; border-radius: 1.5rem; box-shadow: 0 10px 20px rgba(0,0,0,0.3); border: 1px solid #374151;">
            <h2 style="font-size: 2rem; font-weight: bold; color: white; text-align: center; margin-bottom: 2rem;">
                DASHBOARD GENERAL
            </h2>

            <!-- Tarjetas -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 2rem;">

                <!-- Tarjeta 1 -->
                <div style="background: linear-gradient(to top right, #fb923c, #ea580c); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">👥</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Usuarios</div>
                    <div style="font-size: 1.8rem;">{{ $usuarios }}</div>
                </div>

                <!-- Tarjeta 2 -->
                <div style="background: linear-gradient(to top right, #ec4899, #be185d); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">🏢</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Proveedores</div>
                    <div style="font-size: 1.8rem;">{{ $proveedores }}</div>
                </div>

                <!-- Tarjeta 3 -->
                <div style="background: linear-gradient(to top right, #4ade80, #16a34a); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📦</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Productos</div>
                    <div style="font-size: 1.8rem;">{{ $productos }}</div>
                </div>

                <!-- Tarjeta 4 -->
                <div style="background: linear-gradient(to top right, #c084fc, #9333ea); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">🧾</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Ventas</div>
                    <div style="font-size: 1.8rem;">{{ $ventas }}</div>
                </div>

                <!-- Tarjeta 5 -->
                <div style="background: linear-gradient(to top right, #fde047, #facc15); color: black; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📥</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Entradas</div>
                    <div style="font-size: 1.8rem;">{{ $entradas }}</div>
                </div>

                <!-- Tarjeta 6 -->
                <div style="background: linear-gradient(to top right, #fb7185, #e11d48); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📤</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Salidas</div>
                    <div style="font-size: 1.8rem;">{{ $salidas }}</div>
                </div>

                <!-- Tarjeta 6 -->
                <div style="background: linear-gradient(to top right, #3b82f6, #1e3a8a); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📚</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Categorías</div>
                    <div style="font-size: 1.8rem;">{{ $categorias }}</div>
                </div>

                <!-- Tarjeta 7 -->
                <div style="background: linear-gradient(to top right, #60a5fa, #2563eb); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📦</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Existencia Total</div>
                    <div style="font-size: 1.8rem;">{{ $existencia_total }}</div>
                </div>

                <!-- Tarjeta 8 -->
                <div style="background: linear-gradient(to top right, #22d3ee, #0891b2); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">🚚</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Existencia Vendida</div>
                    <div style="font-size: 1.8rem;">{{ $existencia_vendida }}</div>
                </div>

                <!-- Tarjeta 9 -->
                <div style="background: linear-gradient(to top right, #52525b, #18181b); color: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                    <div style="font-size: 2rem;">📊</div>
                    <div style="font-size: 1.2rem; font-weight: bold;">Existencia Actual</div>
                    <div style="font-size: 1.8rem;">{{ $existencia_actual }}</div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>