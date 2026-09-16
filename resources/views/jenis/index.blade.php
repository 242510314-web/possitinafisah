@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #eaf4ff 0%, #dcecff 50%, #f5f9ff 100%);
        min-height: 100vh;
    }

    .jenis-page {
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
    .create-jenis-btn {
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

    .create-jenis-btn:hover {
        color: white;
        transform: translateY(-3px);
        background: linear-gradient(135deg, #4d92da, #367fc7);
        box-shadow: 0 12px 25px rgba(67, 136, 206, .40);
    }

    .create-jenis-btn span {
        font-size: 19px;
        line-height: 1;
    }

    /* =========================
       MAIN CARD
    ========================= */
    .jenis-card {
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
    .jenis-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
    }

    /* =========================
       TABLE
    ========================= */
    .jenis-table-wrapper {
        overflow-x: auto;
    }

    .jenis-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .jenis-table thead {
        background: #dcecff;
    }

    .jenis-table thead th {
        padding: 16px 24px;
        border: none;
        color: #3972a4;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .8px;
    }

    .jenis-table tbody tr {
        border-bottom: 1px solid #e5eef7;
        transition: .2s ease;
    }

    .jenis-table tbody tr:last-child {
        border-bottom: none;
    }

    .jenis-table tbody tr:hover {
        background: #f1f7ff;
    }

    .jenis-table tbody td,
    .jenis-table tbody th {
        padding: 17px 24px;
        border: none;
        color: #4d6983;
        font-size: 13px;
        vertical-align: middle;
    }

    .number-column {
        width: 70px;
        color: #7e9ab4 !important;
        font-weight: 700;
    }

    /* =========================
       JENIS
    ========================= */
    .jenis-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .jenis-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #e2f1ff;
        color: #5795cc;
        font-size: 16px;
    }

    .jenis-name {
        color: #315a7c;
        font-weight: 800;
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

    .empty-description {
        margin: 0;
        color: #8aa2b8;
        font-size: 12px;
    }

    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 768px) {

        .jenis-page {
            padding: 22px 0 40px;
        }

        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .page-title {
            font-size: 28px;
        }

        .create-jenis-btn {
            width: 100%;
        }

        .jenis-toolbar {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
    }
</style>


<div class="container jenis-page">

    {{-- =========================
         HEADER
    ========================== --}}
    <div class="page-header">

        <div>

            <div class="page-label">
                🏷️ Jenis Management
            </div>

            <h1 class="page-title">
                Halaman Jenis
            </h1>

            <p class="page-description">
                Kelola jenis atau kategori produk yang tersedia.
            </p>

        </div>


        @can('create', App\Models\Jenis::class)

        <a href="{{ route('jenis.create') }}"
           class="create-jenis-btn">

            <span>＋</span>
            Tambah Jenis

        </a>

        @endcan

    </div>
    

    {{-- =========================
         MAIN CARD
    ========================== --}}
    <div class="jenis-card">

        {{-- TOOLBAR --}}
        <div class="jenis-toolbar">

            <div class="toolbar-title">

                <div class="toolbar-icon">
                    🏷️
                </div>

                <span>Daftar Jenis</span>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="jenis-table-wrapper">

            <table class="jenis-table">

                <thead>

                <tr>

                    <th class="number-column">
                        #
                    </th>

                    <th>
                        Nama Jenis
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse ($jenis as $item)

                    <tr>

                        <th scope="row" class="number-column">
                            {{ $loop->iteration }}
                        </th>


                        <td>

                            <div class="jenis-info">

                                <div class="jenis-icon">
                                    🏷️
                                </div>

                                <span class="jenis-name">
                                    {{ $item->nama_jenis }}
                                </span>

                            </div>

                        </td>


                        <td>

                            <div class="action-wrapper">

                                @can('update', $item)

                                <a
                                    href="{{ route('jenis.edit', $item) }}"
                                    class="action-btn edit-btn"
                                    title="Edit Jenis">
                                    ✏️
                                </a>

                                @endcan


                                @can('delete', $item)

                                <form
                                    action="{{ route('jenis.destroy', $item) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Hapus Jenis"
                                        onclick="return confirm('Apakah anda yakin akan menghapus jenis ini?')">
                                        🗑️
                                    </button>

                                </form>

                                @endcan

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="3" class="empty-state">

                            <div class="empty-icon">
                                🏷️
                            </div>

                            <div class="empty-title">
                                Data jenis tidak tersedia
                            </div>

                            <p class="empty-description">
                                Belum ada jenis yang dapat ditampilkan.
                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
