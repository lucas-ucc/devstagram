@extends ('layouts.app')

@section ('titulo')
    Registrate en DevStagram
@endsection

@section ('contenido')
    <div class="md:flex md:gap-10 md-items-center">
        <div class="md:w-1/2 p-5">
            <img
                src="{{ asset('img/registrar.jpg') }}"
                alt="Imagen registro de usuarios"
            />
        </div>
        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-xl">
            <form action="">
                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-2 block uppercase text-gray-500 font-bold"
                        >Nombre</label
                    >
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="username"
                        class="mb-2 block uppercase text-gray-500 font-bold"
                        >Username</label
                    >
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="email"
                        class="mb-2 block uppercase text-gray-500 font-bold"
                        >Email</label
                    >
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="password"
                        class="mb-2 block uppercase text-gray-500 font-bold"
                        >Password</label
                    >
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password de Registro"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="password_confirmation"
                        class="mb-2 block uppercase text-gray-500 font-bold"
                        >Repetir Password</label
                    >
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Password"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection
