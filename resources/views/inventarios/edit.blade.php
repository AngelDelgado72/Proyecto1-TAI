<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Editar Entrada de Inventario</h2>
                    <form method="POST" action="{{ route('inventarios.update', $inventario->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="producto_id" :value="__('Producto')" />
                            <select id="producto_id" name="producto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" {{ $inventario->producto_id == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('producto_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="categoria_id" :value="__('Categoría')" />
                            <select id="categoria_id" name="categoria_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $inventario->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="fecha_entrada" :value="__('Fecha de Entrada')" />
                            <x-text-input id="fecha_entrada" class="block mt-1 w-full" type="date" name="fecha_entrada" :value="old('fecha_entrada', $inventario->fecha_entrada)" required />
                            <x-input-error :messages="$errors->get('fecha_entrada')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="fecha_salida" :value="__('Fecha de Salida')" />
                            <x-text-input id="fecha_salida" class="block mt-1 w-full" type="date" name="fecha_salida" :value="old('fecha_salida', $inventario->fecha_salida)" />
                            <x-input-error :messages="$errors->get('fecha_salida')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="movimiento" :value="__('Movimiento')" />
                            <select id="movimiento" name="movimiento" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Entrada" {{ $inventario->movimiento == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="Salida" {{ $inventario->movimiento == 'Salida' ? 'selected' : '' }}>Salida</option>
                            </select>
                            <x-input-error :messages="$errors->get('movimiento')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="motivo" :value="__('Motivo')" />
                            <x-text-input id="motivo" class="block mt-1 w-full" type="text" name="motivo" :value="old('motivo', $inventario->motivo)" required />
                            <x-input-error :messages="$errors->get('motivo')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="cantidad" :value="__('Cantidad')" />
                            <x-text-input id="cantidad" class="block mt-1 w-full" type="number" step="1" name="cantidad" :value="old('cantidad', $inventario->cantidad)" required />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                        </div>
                        <div class="flex justify-end">
                            <x-primary-button>
                                {{ __('Actualizar Entrada') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
