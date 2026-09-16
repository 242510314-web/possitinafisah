@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    /* =========================
       BACKGROUND
    ========================= */
    body {
        background: linear-gradient(
            135deg,
            #eaf4ff 0%,
            #dcecff 50%,
            #f5f9ff 100%
        );
        min-height: 100vh;
    }


    /* =========================
       PAGE WRAPPER
    ========================= */
    .penjualan-page {
        padding: 35px 0 60px;
    }


    /* =========================
       HEADER
    ========================= */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .page-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #cfe5ff;
        color: #367bc1;
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 10px;
        box-shadow: 0 5px 15px rgba(71, 137, 202, .12);
    }

    .page-title {
        margin: 0;
        color: #214f7a;
        font-size: 34px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .page-description {
        margin: 7px 0 0;
        color: #6583a0;
        font-size: 14px;
    }


    /* =========================
       CREATE BUTTON
    ========================= */
    .create-penjualan-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 21px;
        border-radius: 14px;
        background: linear-gradient(135deg, #5b9fe3, #4388ce);
        color: white;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        box-shadow: 0 8px 20px rgba(67, 136, 206, .30);
        transition: .25s ease;
        white-space: nowrap;
    }

    .create-penjualan-btn:hover {
        color: white;
        transform: translateY(-3px);
        background: linear-gradient(135deg, #4d92da, #367fc7);
        box-shadow: 0 12px 25px rgba(67, 136, 206, .40);
    }

    .create-penjualan-btn span {
        font-size: 19px;
        line-height: 1;
    }


    /* =========================
       ALERT
    ========================= */
    .custom-alert {
        border: none;
        border-radius: 14px;
        margin-bottom: 20px;
        background: #fff0f2;
        color: #c66a76;
        box-shadow: 0 5px 15px rgba(198, 106, 118, .10);
    }


    /* =========================
       MAIN CARD
    ========================= */
    .penjualan-card {
        background: rgba(255, 255, 255, .96);
        border: 1px solid #d6e6f7;
        border-radius: 22px;
        overflow: hidden;
        box-shadow:
            0 15px 40px rgba(52, 102, 153, .13),
            0 3px 8px rgba(52, 102, 153, .05);
    }


    /* =========================
       TOOLBAR
    ========================= */
    .penjualan-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 21px 24px;
        background: linear-gradient(135deg, #f8fbff, #eef6ff);
        border-bottom: 1px solid #dbe9f7;
    }

    .toolbar-title {
        display: flex;
        align-items: center;
        gap: 11px;
        color: #315c82;
        font-size: 15px;
        font-weight: 800;
        white-space: nowrap;
    }

    .toolbar-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #cde5ff, #b9d9f7);
        color: #367fc5;
        border-radius: 11px;
        box-shadow: 0 5px 12px rgba(75, 140, 204, .15);
        font-size: 17px;
    }


    /* =========================
       SEARCH
    ========================= */
    .search-form {
        width: 390px;
        max-width: 100%;
    }

    .search-box {
        display: flex;
        align-items: center;
        background: white;
        border: 1px solid #cfe0f1;
        border-radius: 13px;
        padding: 4px;
        transition: .25s ease;
    }

    .search-box:focus-within {
        border-color: #6da7df;
        box-shadow: 0 0 0 4px rgba(89, 151, 210, .12);
    }

    .search-icon {
        padding-left: 12px;
        color: #6396c3;
        font-size: 15px;
    }

    .search-box input {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        padding: 10px 12px;
        color: #365b7d;
        font-size: 13px;
    }

    .search-box input::placeholder {
        color: #91a9be;
    }

    .search-btn {
        border: none;
        background: #d9ebff;
        color: #397bb9;
        padding: 10px 17px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .search-btn:hover {
        background: #5d9fe0;
        color: white;
    }


    /* =========================
       TABLE
    ========================= */
    .penjualan-table-wrapper {
        overflow-x: auto;
    }

    .penjualan-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        min-width: 900px;
    }

    .penjualan-table thead {
        background: #dcecff;
    }

    .penjualan-table thead th {
        padding: 16px 20px;
        border: none;
        color: #3972a4;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .8px;
        white-space: nowrap;
    }

    .penjualan-table tbody tr {
        border-bottom: 1px solid #e5eef7;
        transition: .2s ease;
    }

    .penjualan-table tbody tr:last-child {
        border-bottom: none;
    }

    .penjualan-table tbody tr:hover {
        background: #f1f7ff;
    }

    .penjualan-table tbody td,
    .penjualan-table tbody th {
        padding: 15px 20px;
        border: none;
        color: #4d6983;
        font-size: 13px;
        vertical-align: middle;
    }

    .number-column {
        width: 55px;
        color: #7e9ab4 !important;
        font-weight: 700;
    }


    /* =========================
       CASHIER
    ========================= */
    .user-info {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #426682;
        font-weight: 700;
        white-space: nowrap;
    }

    .user-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #e2f1ff;
        color: #5795cc;
        font-size: 13px;
    }


    /* =========================
       DATE
    ========================= */
    .date-info {
        color: #52728e;
        font-weight: 600;
        white-space: nowrap;
    }


    /* =========================
       TOTAL
    ========================= */
    .total-price {
        color: #397db9;
        font-weight: 800;
        white-space: nowrap;
    }


    /* =========================
       PAYMENT METHOD
    ========================= */
    .payment-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 13px;
        border-radius: 20px;
        background: #e2f0ff;
        color: #397db9;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }


    /* =========================
       STATUS
    ========================= */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 13px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-badge::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .badge-open {
        background: #fff5dd;
        color: #b58228;
    }

    .badge-open::before {
        background: #e2ae42;
        box-shadow: 0 0 0 3px #ffedbd;
    }

    .badge-complete {
        background: #dff6ed;
        color: #29906d;
    }

    .badge-complete::before {
        background: #54b996;
        box-shadow: 0 0 0 3px #c9eee1;
    }


    /* =========================
       ACTION
    ========================= */
    .action-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 11px;
        text-decoration: none;
        transition: .2s ease;
        cursor: pointer;
    }

    .detail-btn {
        width: auto;
        padding: 0 14px;
        background: #e2f1ff;
        color: #4b91cc;
        font-size: 12px;
        font-weight: 700;
    }

    .detail-btn:hover {
        background: #c9e5fc;
        color: #337bb7;
        transform: translateY(-2px);
    }

    .edit-btn {
        background: #e2f1ff;
        color: #4b91cc;
    }

    .edit-btn:hover {
        background: #c9e5fc;
        color: #337bb7;
        transform: translateY(-2px);
    }

    .delete-btn {
        background: #fff0f2;
        color: #d77984;
    }

    .delete-btn:hover {
        background: #ffe0e4;
        color: #c85f6c;
        transform: translateY(-2px);
    }


    /* =========================
       EMPTY STATE
    ========================= */
    .empty-state {
        padding: 60px 20px !important;
        text-align: center;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        border-radius: 18px;
        background: #dceeff;
        color: #5897d0;
        font-size: 24px;
    }

    .empty-title {
        color: #4d6e8c;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 5px;
    }


    /* =========================
       PAGINATION
    ========================= */
    .pagination-wrapper {
        padding: 20px 24px;
        background: #f8fbff;
        border-top: 1px solid #e2edf7;
    }

    .pagination {
        margin: 0;
        justify-content: flex-end;
        gap: 5px;
    }

    .pagination .page-link {
        border: 1px solid #d5e5f4;
        color: #4b89c3;
        background: white;
        border-radius: 10px;
        padding: 7px 12px;
        font-size: 13px;
        transition: .2s ease;
    }

    .pagination .page-link:hover {
        background: #e0efff;
        color: #397db9;
        border-color: #c5def4;
    }

    .pagination .active .page-link {
        background: #5d9fe0;
        border-color: #5d9fe0;
        color: white;
        box-shadow: 0 5px 12px rgba(93, 159, 224, .25);
    }


    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 768px) {

        .penjualan-page {
            padding: 22px 0 40px;
        }

        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .page-title {
            font-size: 28px;
        }

        .create-penjualan-btn {
            width: 100%;
        }

        .penjualan-toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .toolbar-title {
            width: 100%;
        }

        .search-form {
            width: 100%;
        }

        .pagination {
            justify-content: center;
        }
    }
</style>


<div class="container penjualan-page">

    {{-- ALERT --}}
    @if(session('errors'))
        <div class="alert custom-alert">
            {{ session('errors') }}
        </div>
    @endif


    {{-- =========================
         HEADER
    ========================== --}}
    <div class="page-header">

        <div>

            <div class="page-label">
                🛒 Sales Management
            </div>

            <h1 class="page-title">
                Halaman Penjualan
            </h1>

            <p class="page-description">
                Kelola data penjualan dan transaksi dengan mudah.
            </p>

        </div>


        <a href="{{ route('penjualan.create') }}"
           class="create-penjualan-btn">

            <span>＋</span>
            Tambah Penjualan

        </a>

    </div>


    {{-- =========================
         MAIN CARD
    ========================== --}}
    <div class="penjualan-card">

        {{-- TOOLBAR --}}
        <div class="penjualan-toolbar">

            <div class="toolbar-title">

                <div class="toolbar-icon">
                    🛒
                </div>

                <span>Daftar Penjualan</span>

            </div>


            <form action="{{ route('penjualan.index') }}"
                  method="GET"
                  class="search-form">

                <div class="search-box">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari penjualan..."
                    >

                    <button
                        class="search-btn"
                        type="submit">
                        Search
                    </button>

                </div>

            </form>

        </div>


        {{-- =========================
             TABLE
        ========================== --}}
        <div class="penjualan-table-wrapper">

            <table class="penjualan-table">

                <thead>

                    <tr>

                        <th class="number-column">
                            #
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kasir
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Uang Pembayaran
                        </th>

                        <th>
                            Kembalian
                        </th>

                        <th>
                            Metode
                        </th>

                        <th>
                            Status
                        </th>

                        <th width="220">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($sales as $sale)

                    <tr>

                        <th scope="row" class="number-column">
                            {{ $sales->firstItem() + $loop->index }}
                        </th>


                        <td class="date-info">
                            {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                        </td>


                        <td>

                            <div class="user-info">

                                <div class="user-icon">
                                    👤
                                </div>

                                {{ $sale->user->name }}

                            </div>

                        </td>


                        <td>

                            <strong class="total-price">
                                Rp {{ number_format($sale->total_pembayaran) }}
                            </strong>

                        </td>

                        <td>
                            @if($sale->metode_pembayaran === 'CASH')
                                Rp {{ number_format($sale->uang_dibayar) }}
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if($sale->metode_pembayaran === 'CASH')
                                Rp {{ number_format($sale->kembalian) }}
                            @else
                                -
                            @endif
                        </td>


                        <td>

                            <span class="payment-badge">
                                {{ $sale->metode_pembayaran }}
                            </span>

                        </td>


                        <td>

                            @if($sale->status == 'OPEN')

                                <span class="status-badge badge-open">
                                    OPEN
                                </span>

                            @else

                                <span class="status-badge badge-complete">
                                    COMPLETED
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="action-wrapper">

                                {{-- JIKA STATUS OPEN --}}
                                @if($sale->status == 'OPEN')

                                    @can('view', $sale)

                                        <a
                                            href="{{ route('penjualan.edit', $sale) }}"
                                            class="action-btn detail-btn"
                                            title="Lanjutkan Penjualan">
                                            ➜ Lanjutkan
                                        </a>

                                    @endcan


                                    @can('delete', $sale)

                                        <form
                                            action="{{ route('penjualan.destroy', $sale) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete-btn"
                                                title="Hapus Penjualan"
                                                onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                                🗑️
                                            </button>

                                        </form>

                                    @endcan


                                {{-- JIKA STATUS COMPLETED --}}
                                @else

                                    <a
                                        href="{{ route('penjualan.show', $sale) }}"
                                        class="action-btn detail-btn"
                                        title="Detail Penjualan">
                                        Detail
                                    </a>

                                @endif

                            </div>

                        </td>

                    </tr>


                    @empty

                    <tr>

                        <td colspan="7" class="empty-state">

                            <div class="empty-icon">
                                🛒
                            </div>

                            <div class="empty-title">
                                Data penjualan tidak tersedia
                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        <div class="pagination-wrapper">

            {{ $sales->links() }}

        </div>

    </div>

</div>

@endsection