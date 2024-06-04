<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Editar Venta</h2>
                    <form method="POST" action="{{ route('ventas.update', $venta->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="producto_id" :value="__('Producto')" />
                            <input id="producto_id" disabled data-price="{{ $venta->producto->precio_venta }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="producto_id" value="{{ $venta->producto->nombre }}" />
                            <x-input-error :messages="$errors->get('producto_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="cliente_id" :value="__('Cliente')" />
                            <select id="cliente_id" name="cliente_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $venta->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cantidad" :value="__('Cantidad')" />
                            <x-text-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" :value="old('cantidad', $venta->cantidad)" />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="subtotal" :value="__('Subtotal')" />
                            <x-text-input id="subtotal" class="block mt-1 w-full" type="number" step="0.01" name="subtotal" :value="old('subtotal', $venta->subtotal)" required />
                            <x-input-error :messages="$errors->get('subtotal')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="iva" :value="__('IVA')" />
                            <x-text-input id="iva" class="block mt-1 w-full" type="number" step="0.01" name="iva" :value="old('iva', $venta->iva)" required />
                            <x-input-error :messages="$errors->get('iva')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="total" :value="__('Total')" />
                            <x-text-input id="total" class="block mt-1 w-full" type="number" step="0.01" name="total" :value="old('total', $venta->total)" required />
                            <x-input-error :messages="$errors->get('total')" class="mt-2" />
                        </div>
                        <div class="flex justify-end">
                            <x-primary-button>
                                {{ __('Registrar Venta') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cantidadInput = document.getElementById('cantidad');
            const subtotalInput = document.getElementById('subtotal');
            const ivaInput = document.getElementById('iva');
            const totalInput = document.getElementById('total');
            const productoInput = document.getElementById('producto_id');
            const ivaRate = 0.21; // 21% de IVA

            function updateValues() {
                const price = parseFloat(productoInput.getAttribute('data-price')) || 0;
                const cantidad = parseFloat(cantidadInput.value) || 0;

                const subtotal = price * cantidad;
                const iva = subtotal * ivaRate;
                const total = subtotal + iva;

                subtotalInput.value = subtotal.toFixed(2);
                ivaInput.value = iva.toFixed(2);
                totalInput.value = total.toFixed(2);
            }

            cantidadInput.addEventListener('input', updateValues);

            // Inicializa los valores cuando la página se carga
            updateValues();
        });
    </script>
</x-app-layout>
