<x-app-layout : title="__('Lista de cursos')">


    <div class="relative overflow-x-auto mt-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $c)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $c->title }}
                    </th>
                    <td class="px-6 py-4">
                        ${{ $c->price }}
                    </td>
                    <td class="px-6 py-4">
                        //(pasando el parámetro explícitamente)
            <x-produccion.enlace href="{{ route('courses.show', ['course=> $c->id ']) }}">ver</x-produccion.enlace>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</body>

</html>
</x-app-layout>