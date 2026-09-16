@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #eaf4ff 0%, #dcecff 50%, #f5f9ff 100%);
        min-height: 100vh;
    }

    .users-page {
        padding: 35px 0 60px;
    }

    /* =========================
       HEADER
    ========================= */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
        gap: 20px;
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
    .create-user-btn {
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

    .create-user-btn:hover {
        color: white;
        transform: translateY(-3px);
        background: linear-gradient(135deg, #4d92da, #367fc7);
        box-shadow: 0 12px 25px rgba(67, 136, 206, .40);
    }

    .create-user-btn span {
        font-size: 19px;
        line-height: 1;
    }

    /* =========================
       MAIN CARD
    ========================= */
    .users-card {
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
    .users-toolbar {
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
    .users-table-wrapper {
        overflow-x: auto;
    }

    .users-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .users-table thead {
        background: #dcecff;
    }

    .users-table thead th {
        padding: 16px 23px;
        border: none;
        color: #3972a4;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .8px;
        white-space: nowrap;
    }

    .users-table tbody tr {
        border-bottom: 1px solid #e5eef7;
        transition: .2s ease;
    }

    .users-table tbody tr:last-child {
        border-bottom: none;
    }

    .users-table tbody tr:hover {
        background: #f1f7ff;
    }

    .users-table tbody td {
        padding: 17px 23px;
        border: none;
        color: #4d6983;
        font-size: 13px;
        vertical-align: middle;
    }

    .number-column {
        width: 60px;
        color: #7e9ab4 !important;
        font-weight: 700;
    }

    /* =========================
       USER
    ========================= */
    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #8ec2ef, #599bd7);
        color: white;
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 5px 12px rgba(80, 145, 204, .20);
    }

    .user-name {
        color: #315a7c;
        font-size: 13px;
        font-weight: 800;
    }

    .user-email {
        color: #6f8ca6 !important;
        font-size: 13px !important;
    }

    /* =========================
       ROLE
    ========================= */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border-radius: 20px;
        background: #e2f0ff;
        color: #397db9;
        font-size: 11px;
        font-weight: 800;
    }

    .role-badge::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #5d9fda;
        box-shadow: 0 0 0 3px #cfe6fb;
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

        .users-page {
            padding: 22px 0 40px;
        }

        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .page-title {
            font-size: 28px;
        }

        .create-user-btn {
            width: 100%;
        }

        .users-toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .toolbar-title {
            width: 100%;
        }

        .search-form {
            width: 100%;
        }

        .users-table thead th,
        .users-table tbody td {
            padding: 13px 15px;
        }
    }
</style>


<div class="container users-page">

    {{-- =========================
         HEADER
    ========================== --}}
    <div class="page-header">

        <div>

            <div class="page-label">
                👥 User Management
            </div>

            <h1 class="page-title">
                Halaman Users
            </h1>

            <p class="page-description">
                Kelola pengguna dan hak akses sistem dengan mudah.
            </p>

        </div>


        <a href="{{ route('admin.users.create') }}"
           class="create-user-btn">

            <span>＋</span>
            Tambah Users

        </a>

    </div>


    {{-- =========================
         USERS CARD
    ========================== --}}
    <div class="users-card">

        {{-- TOOLBAR --}}
        <div class="users-toolbar">

            <div class="toolbar-title">

                <div class="toolbar-icon">
                    👤
                </div>

                <span>Daftar Pengguna</span>

            </div>


            <form action="{{ route('admin.users') }}"
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
                        placeholder="Search username or email..."
                    >

                    <button
                        class="search-btn"
                        type="submit">
                        Search
                    </button>

                </div>

            </form>

        </div>


        {{-- TABLE --}}
        <div class="users-table-wrapper">

            <table class="users-table">

                <thead>

                <tr>

                    <th class="number-column">
                        #
                    </th>

                    <th>
                        Name
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Role
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse ($users as $user)

                    <tr>

                        <td class="number-column">
                            {{ $users->firstItem() + $loop->index }}
                        </td>


                        <td>

                            <div class="user-info">

                                <div class="user-avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div class="user-name">
                                    {{ $user->name }}
                                </div>

                            </div>

                        </td>


                        <td class="user-email">
                            {{ $user->email }}
                        </td>


                        <td>

                            <span class="role-badge">
                                {{ $user->role->name }}
                            </span>

                        </td>


                        <td>

                            <div class="action-wrapper">

                                <a
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="action-btn edit-btn"
                                    title="Edit User">
                                    ✏️
                                </a>


                                <form
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Hapus User"
                                        onclick="return confirm('Yakin hapus user ini?')">
                                        🗑️
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="empty-state">

                            <div class="empty-icon">
                                👤
                            </div>

                            <div class="empty-title">
                                Belum ada pengguna
                            </div>

                            <p class="empty-description">
                                Data pengguna belum tersedia.
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