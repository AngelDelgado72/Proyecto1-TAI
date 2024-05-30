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
                            <select id="producto_id" name="producto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ $venta->producto_id == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('producto_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="categoria_id" :value="__('Categoría')" />
                            <select id="categoria_id" name="categoria_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $venta->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
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
                            <x-input-label for="fecha_venta" :value="__('Fecha de Venta')" />
                            <x-text-input id="fecha_venta" class="block mt-1 w-full" type="date" name="fecha_venta" :value="old('fecha_venta', $venta->fecha_venta)" />
                            <x-input-error :messages="$errors->get('fecha_venta')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="subtotal" :value="__('Subtotal')" />
                            <x-text-input id="subtotal" class="block mt-1 w-full" type="number" step="0.01" name="subtotal" :value="old('subtotal')" :value="old('subtotal', $venta->subtotal)" required />
                            <x-input-error :messages="$errors->get('subtotal')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="iva" :value="__('IVA')" />
                            <x-text-input id="iva" class="block mt-1 w-full" type="number" step="0.01" name="iva" :value="old('iva')" :value="old('iva', $venta->iva)" required />
                            <x-input-error :messages="$errors->get('iva')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="total" :value="__('Total')" />
                            <x-text-input id="total" class="block mt-1 w-full" type="number" step="0.01" name="total" :value="old('total')" :value="old('total', $venta->total)" required />
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
</x-app-layout>
