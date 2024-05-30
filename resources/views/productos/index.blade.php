<x-app-layout>
    <div class="py-12">
        <div class="max-w-full px-10 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold leading-tight">Productos</h2>
                        <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nuevo Producto
                        </a>
                    </div>
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción Corta</th>
                                <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción Larga</th>
                                <th class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio Compra</th>
                                <th class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio Venta</th>
                                <th class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                <th class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Compra</th>
                                <th class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                                <th class="w-1/6 px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($productos as $producto)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->descripcion_corta }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->descripcion_larga }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->precio_compra }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->precio_venta }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->categoria->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->fecha_compra }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $producto->color }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('productos.show', $producto->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
