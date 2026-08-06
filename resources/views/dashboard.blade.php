@extends('layouts.app')

@section('title', 'Dashboard Ringkasan')

@section('content')

<div style="background-color: #f8f9fa; min-height: 100vh; padding: 30px 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">

        {{-- Header Title & Date --}}
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #dee2e6; padding-bottom: 15px; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <div>
                <h2 style="font-weight: 700; color: #333; margin: 0; font-size: 24px;">Ringkasan Hari Ini</h2>
                <p style="color: #6c757d; margin: 5px 0 0 0; font-size: 14px;">Monitor performa penjualan dan status inventaris toko secara real-time.</p>
            </div>
            <div style="background: white; border: 1px solid #ced4da; padding: 8px 15px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <span style="color: #495057; font-size: 14px; font-weight: 500;">
                    {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>

        {{-- Today's Sales --}}
        <div style="margin-bottom: 25px;">
            <h5 style="font-weight: 700; color: #333; font-size: 15px; margin-bottom: 12px;">Penjualan Hari Ini</h5>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 15px;">

                <div style="background: white; border: 1px solid #e9ecef; border-left: 4px solid #8f9296; border-radius: 8px; padding: 18px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <p style="color: #6c757d; font-size: 13px; margin: 0 0 6px 0;">Total Nilai Penjualan</p>
                    <h4 style="font-weight: 700; color: #333; margin: 0; font-size: 22px;">Rp {{ number_format($ringkasan['total_penjualan'] ?? 0, 0, ',', '.') }}</h4>
                </div>

                <div style="background: white; border: 1px solid #e9ecef; border-left: 4px solid #8f9296; border-radius: 8px; padding: 18px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <p style="color: #6c757d; font-size: 13px; margin: 0 0 6px 0;">Jumlah Transaksi</p>
                    <h4 style="font-weight: 700; color: #333; margin: 0; font-size: 22px;">{{ $ringkasan['total_transaksi'] ?? 0 }}</h4>
                </div>

            </div>
        </div>

        {{-- Cash & Payment Status --}}
        <div style="margin-bottom: 25px;">
            <h5 style="font-weight: 700; color: #333; font-size: 15px; margin-bottom: 12px;">Status Kas & Pembayaran</h5>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 15px;">

                <div style="background: white; border: 1px solid #e9ecef; border-left: 4px solid #8f9296; border-radius: 8px; padding: 18px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <p style="color: #6c757d; font-size: 13px; margin: 0 0 6px 0;">Total Pembayaran Tunai</p>
                    <h4 style="font-weight: 700; color: #333; margin: 0; font-size: 22px;">Rp {{ number_format($ringkasan['total_cash'] ?? 0, 0, ',', '.') }}</h4>
                </div>

                <div style="background: white; border: 1px solid #e9ecef; border-left: 4px solid #8f9296; border-radius: 8px; padding: 18px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <p style="color: #6c757d; font-size: 13px; margin: 0 0 6px 0;">Total Pembayaran Non-Tunai</p>
                    <h4 style="font-weight: 700; color: #333; margin: 0; font-size: 22px;">Rp {{ number_format($ringkasan['total_non_tunai'] ?? 0, 0, ',', '.') }}</h4>
                </div>

            </div>
        </div>

          {{-- Best Seller Products --}}
       <div style="margin-bottom: 10px;">
    <h5 style="font-weight: 700; color: #333; font-size: 15px; margin-bottom: 12px;">Produk Terlaris</h5>
    <div style="background: white; border: 1px solid #e9ecef; border-top: 3px solid #8f9296; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <table style="width: 100%; font-size: 13px; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8f9fa;">
                    <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Nama</th>
                    <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Stok</th>
                    <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Unit Terjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produkTerlaris as $produk)
                    <tr>
                        <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->nama }}</td>
                        <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->stok }}</td>
                        <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">
                            <span style="background: #e7f1ff; color: #0d6efd; font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 20px;">{{ $produk->total_terjual }} unit</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="padding: 24px 18px; text-align: center; color: #adb5bd; font-size: 13px;">Belum ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

  {{-- Critical Inventory Status --}}
        <div style="margin-bottom: 25px;">
            <h5 style="font-weight: 700; color: #333; font-size: 15px; margin-bottom: 12px;">Status Inventori</h5>
             <div style="background: white; border: 1px solid #e9ecef; border-top: 3px solid #8f9296; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 15px;">

                <div style="background: white; border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <div style="padding: 12px 18px; border-bottom: 1px solid #e9ecef; font-weight: 600; font-size: 14px; color: #333; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #fd7e14; display: inline-block;"></span>
                        Daftar Produk Rendah
                    </div>
                    <table style="width: 100%; font-size: 13px; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8f9fa;">
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">#</th>
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Nama</th>
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokRendah as $i => $produk)
                                <tr>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $i + 1 }}</td>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->nama }}</td>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="padding: 24px 18px; text-align: center; color: #adb5bd; font-size: 13px;">Seluruh produk berada dalam kondisi stok aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div style="background: white; border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                    <div style="padding: 12px 18px; border-bottom: 1px solid #e9ecef; font-weight: 600; font-size: 14px; color: #333; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #dc3545; display: inline-block;"></span>
                        Produk Habis Stok
                    </div>
                    <table style="width: 100%; font-size: 13px; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8f9fa;">
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">#</th>
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Nama</th>
                                <th style="padding: 10px 18px; text-align: left; color: #6c757d; font-weight: 600; font-size: 12px; text-transform: uppercase; border-bottom: 1px solid #e9ecef;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokHabis as $i => $produk)
                                <tr>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $i + 1 }}</td>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->nama }}</td>
                                    <td style="padding: 10px 18px; border-bottom: 1px solid #f1f3f5;">{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="padding: 24px 18px; text-align: center; color: #adb5bd; font-size: 13px;">Seluruh produk berada dalam kondisi stok aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection