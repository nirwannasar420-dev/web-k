@extends('layouts.app')

@section('title', 'Tambah Aktivitas')
@section('page-title', 'Tambah Aktivitas')

@section('styles')

<style>

    .form-card {
        background:white;
        padding:30px;
        max-width:850px;
        border-radius:14px;
        border:1px solid #eef0f3;
        box-shadow:0 2px 8px rgba(0,0,0,0.05);
    }

    .form-group {
        margin-bottom:20px;
    }

    .form-group label {
        display:block;
        margin-bottom:7px;
        font-size:13px;
        font-weight:600;
        color:#374151;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width:100%;
        padding:11px 13px;
        border:1px solid #d1d5db;
        border-radius:8px;
        outline:none;
        font-size:13px;
        background:white;
    }

    .form-group textarea {
        min-height:120px;
        resize:vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color:#2563eb;
    }

    .error {
        color:#dc2626;
        font-size:12px;
        margin-top:5px;
    }

    .actions {
        display:flex;
        gap:10px;
        margin-top:25px;
    }

    .btn {
        padding:11px 18px;
        border-radius:8px;
        border:none;
        text-decoration:none;
        cursor:pointer;
        font-size:13px;
        font-weight:600;
    }

    .btn-primary {
        background:#2563eb;
        color:white;
    }

    .btn-secondary {
        background:#f3f4f6;
        color:#374151;
    }

</style>

@endsection


@section('content')

@php
    $selectedOpportunity = request('opportunity_id');
@endphp


<div class="form-card">

    <h2 style="margin-bottom:8px;">
        Tambah Aktivitas
    </h2>

    <p style="
        color:#6b7280;
        font-size:13px;
        margin-bottom:25px;
    ">
        Catat aktivitas yang berkaitan dengan customer atau opportunity.
    </p>


    <form
        action="{{ route('activities.store') }}"
        method="POST"
    >

        @csrf


        <div class="form-group">

            <label>
                Opportunity *
            </label>

            <select
                name="opportunity_id"
                required
            >

                <option value="">
                    Pilih Opportunity
                </option>

                @foreach($opportunities as $opportunity)

                    <option
                        value="{{ $opportunity->id }}"
                        {{ $selectedOpportunity == $opportunity->id
                            ? 'selected'
                            : ''
                        }}
                    >

                        {{ $opportunity->name }}

                        -
                        {{ $opportunity->customer->name ?? '-' }}

                    </option>

                @endforeach

            </select>

            @error('opportunity_id')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label>
                Jenis Aktivitas *
            </label>

            <select
                name="type"
                required
            >

                <option value="">
                    Pilih Aktivitas
                </option>

                <option value="Call">
                    Call
                </option>

                <option value="Email">
                    Email
                </option>

                <option value="Meeting">
                    Meeting
                </option>

                <option value="Follow Up">
                    Follow Up
                </option>

                <option value="Visit">
                    Visit
                </option>

                <option value="Other">
                    Other
                </option>

            </select>

            @error('type')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label>
                Judul Aktivitas *
            </label>

            <input
                type="text"
                name="subject"
                value="{{ old('subject') }}"
                required
            >

            @error('subject')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label>
                Tanggal & Waktu *
            </label>

            <input
                type="datetime-local"
                name="activity_date"
                value="{{ old(
                    'activity_date',
                    now()->format('Y-m-d\TH:i')
                ) }}"
                required
            >

            @error('activity_date')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label>
                Status *
            </label>

            <select
                name="status"
                required
            >

                <option value="planned">
                    Planned
                </option>

                <option value="done">
                    Done
                </option>

                <option value="cancelled">
                    Cancelled
                </option>

            </select>

        </div>


        <div class="form-group">

            <label>
                Catatan
            </label>

            <textarea
                name="notes"
                placeholder="Tambahkan catatan aktivitas..."
            >{{ old('notes') }}</textarea>

        </div>


        <div class="actions">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Simpan Aktivitas
            </button>

            <a
                href="{{ url()->previous() }}"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection