@extends('layout')
@section('konten')
    <div class="container">
        <h1 class="text-center font-bold md:text-3xl text-xl mb-4">Daftar Produk</h1>
        <div class="flex justify-end mb-4 items-center">

            <a href="{{ route('produk.add') }}"
                class="bg-slate-700 hover:bg-slate-600 py-2 px-3 rounded-lg text-white font-medium flex"> <svg
                    xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-white mr-2"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>
                Produk</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Beli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Jual
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $no => $item)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $no + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}"
                                    class="w-20 h-20 object-cover">
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_produk }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->kategori }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->harga_jual }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->harga_beli }}
                            </td>
                            <td class="px-6 py-4 flex items-center gap-x-2">
                                <a href="{{route('produk.update',$item->id)}}"
                                    class="font-medium bg-yellow-600 hover:bg-yellow-500 text-white py-1 px-3 rounded-full">Edit</a>
                                <form action="{{ route('produk.delete', $item->id) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-red-700 hover:bg-red-600 rounded-full text-white font-medium">delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
