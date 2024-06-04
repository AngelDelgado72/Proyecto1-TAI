<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Registrar Venta</h2>
                    <form method="POST" action="{{ route('ventas.store') }}" novalidate>
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="producto_id" :value="__('Producto')" />
                            <select id="producto_id" name="producto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($inventarios as $inventario)
                                    <option value="{{ $inventario->producto->id }}" data-price="{{ $inventario->producto->precio_venta }}">{{ $inventario->producto->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('producto_id')" class="mt-2" />
                        </div>
                        
                        <div class="mb-4">
                            <x-input-label for="cliente_id" :value="__('Cliente')" />
                            <select id="cliente_id" name="cliente_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cantidad" :value="__('Cantidad')" />
                            <x-text-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" :value="old('cantidad')" />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="subtotal" :value="__('Subtotal')" />
                            <input id="subtotal" disabled class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" step="0.01" name="subtotal" value="" />
                            <x-input-error :messages="$errors->get('subtotal')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="iva" :value="__('IVA')" />
                            <input id="iva" disabled class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" step="0.01" name="iva" value="" />
                            <x-input-error :messages="$errors->get('iva')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="total" :value="__('Total')" />
                            <input id="total" disabled class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" step="0.01" name="total" value="" />
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
            const productoSelect = document.getElementById('producto_id');
            const cantidadInput = document.getElementById('cantidad');
            const subtotalInput = document.getElementById('subtotal');
            const ivaInput = document.getElementById('iva');
            const totalInput = document.getElementById('total');
            const ivaRate = 0.21; // 21% de IVA

            function updateValues() {
                const selectedOption = productoSelect.options[productoSelect.selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const cantidad = parseFloat(cantidadInput.value) || 0;

                const subtotal = price * cantidad;
                const iva = subtotal * ivaRate;
                const total = subtotal + iva;

                subtotalInput.value = subtotal.toFixed(2);
                ivaInput.value = iva.toFixed(2);
                totalInput.value = total.toFixed(2);
            }

            productoSelect.addEventListener('change', updateValues);
            cantidadInput.addEventListener('input', updateValues);
        });
    </script>
</x-app-layout>
