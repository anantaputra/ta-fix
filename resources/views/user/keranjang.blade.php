@extends('layouts.app')

@section('content')
<div class="container my-8">
    <div class="w-full bg-white py-3 px-8 border shadow-sm mb-4">
        <div class="grid grid-cols-12 gap-2 text-gray-400 font-semibold">
            <div class="col-span-5">
                Produk
            </div>
            <div class="col-span-2">
                Harga Satuan
            </div>
            <div class="col-span-2">
                Kuantitas
            </div>
            <div class="col-span-2">
                Total Harga
            </div>
            <div>
                Aksi
            </div>
        </div>
    </div>
    @php
        $jml = 0;
        $total = 0;
    @endphp
    @if (isset($keranjang))
    <div class="w-full bg-white shadow-sm mb-4">
        @foreach ($keranjang as $item)
        @php
            $jml++;
            $total += $item->produk->harga * $item->jumlah;
        @endphp
        <div class="w-full px-8 py-4 border">
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-5">
                    <div class="flex items-center space-x-2">
                        <div>
                            @php
                                $gambar = json_decode($item->produk->gambar);
                            @endphp
                            <img src="{{ asset('upload/produk/'.$gambar[0]) }}" alt="" class="w-16 h-16">
                        </div>
                        <div>
                            {{ $item->produk->nama_produk }}
                        </div>
                    </div>
                </div>
                <div class="col-span-2 flex items-center">
                    <div>
                        Rp{{ number_format($item->produk->harga, 0, 0, '.') }}
                    </div>
                </div>
                <div class="col-span-2 flex items-center">
                    {{ $item->jumlah }}
                </div>
                <div class="col-span-2 flex items-center">
                    Rp{{ number_format(($item->produk->harga * $item->jumlah), 0, 0, '.') }}
                </div>
                <div class="flex items-center">
                    <a href="">Hapus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <div class="w-full bg-white py-6 px-8 border shadow-sm mb-4">
        <div class="grid grid-cols-1 gap-2">
            <div class="flex justify-end space-x-4">
                <div>
                    Total ({{ $jml }} produk) : <span class="text-xl text-rose-600">Rp{{ number_format($total, 0 , 0, '.') }}</span>
                </div>
                <div>
                    <a href="{{ route('keranjang.checkout') }}" class="w-full px-16 py-4 text-sm text-center font-semibold tracking-wide text-white uppercase bg-rose-600">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection