@extends('main')

@section('title', 'Periode')

@section('content')
    <a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Periode</a>

    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>Tahun Akademik</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>

        @foreach ($result as $item)
            <tr>
                <td>{{ $item->tahun_akademik }}</td>
                <td>{{ $item->kode_smt }}</td>
                <td>
                    <form method="POST" action="{{ route('periode.destroy', $item->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $item->tahun_akademik }} - {{ $item->kode_smt }}'>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
