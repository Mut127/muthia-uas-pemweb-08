<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TAMU') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <a href="{{ route('tamus.create') }}" class="btn btn-md btn-success mb-3">ADD TAMU</a>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">NAMA</th>
                            <th scope="col" class="px-6 py-3">EMAIL</th>
                            <th scope="col" class="px-6 py-3">NO TELEPON</th>
                            <th scope="col" class="px-6 py-3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tamus as $tamu)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $tamu->nama }}</th>
                            <td class="px-6 py-4">{{ $tamu->email }}</td>
                            <td class="px-6 py-4">{{ $tamu->telepon }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tamus.destroy', $tamu->id) }}" method="POST">
                                    <a href="{{ route('tamus.show', $tamu->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('tamus.edit', $tamu->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data tamu belum Tersedia.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $tamus->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @endif
    </script>

    </div>
    </div>
    </div>
</x-app-layout>>