<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Ver cliente</h2>
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" :value="old('nombre', $cliente->nombre)"  disabled />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="correo" :value="__('Correo')" />
                            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" :value="old('correo', $cliente->correo)"  disabled />
                            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" :value="old('telefono', $cliente->telefono)"  disabled />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" :value="old('direccion', $cliente->direccion)"  disabled />
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="rfc" :value="__('RFC')" />
                            <x-text-input id="rfc" class="block mt-1 w-full" type="text" name="rfc" :value="old('rfc')" :value="old('rfc', $cliente->rfc)"  disabled />
                            <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
