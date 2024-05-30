<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-5 gap-4">
                    <a class="bg-white rounded-lg shadow-lg overflow-hidden p-10" href="{{ route('productos.index') }}">
                        <img class="w-full h-auto" src="{{ asset('img/productos.png') }}" alt="Products Image">
                    </a>
                
                    <a class="bg-white rounded-lg shadow-lg overflow-hidden p-10" href="{{ route('categorias.index') }}">
                        <img class="w-full h-auto" src="{{ asset('img/categorias.png') }}" alt="Categories Image">
                    </a>
                
                    <a class="bg-white rounded-lg shadow-lg overflow-hidden p-10" href="{{ route('ventas.index') }}">
                        <img class="w-full h-auto" src="{{ asset('img/ventas.png') }}" alt="Sales Image">
                    </a>
                
                    <a class="bg-white rounded-lg shadow-lg overflow-hidden p-10" href="{{ route('inventarios.index') }}">
                        <img class="w-full h-auto" src="{{ asset('img/inventarios.png') }}" alt="Inventory Image">
                    </a>
                
                    <a class="bg-white rounded-lg shadow-lg overflow-hidden p-10" href="{{ route('clientes.index') }}">
                        <img class="w-full h-auto" src="{{ asset('img/clientes.png') }}" alt="Clients Image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
