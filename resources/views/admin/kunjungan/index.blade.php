@extends('layouts.app')

@section('content')
<div class="card shadow border-0 text-dark">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">Log Kunjungan</h5>
        @can('admin-only')
        <a href="{{ route('guest.form') }}" target="_blank" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Manual
        </a>
        @endcan
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Ref</th>
                    <th>Nama</th>
                    <th>Keperluan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kunjungan as $row)
                <tr>
                    <td><span class="badge bg-secondary">{{ $row->nomor_kunjungan }}</span></td>
                    <td>{{ $row->pengunjung->nama_lengkap }}</td>
                    <td>{{ Str::limit($row->keperluan, 40) }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            @can('admin-only')
                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}"><i class="fas fa-edit"></i></button>
                            <form action="{{ route('admin.kunjungan.destroy', $row->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.kunjungan.update', $row->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header"><h5>Edit Keperluan</h5></div>
                                <div class="modal-body">
                                    <textarea name="keperluan" class="form-control" rows="3">{{ $row->keperluan }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $kunjungan->links() }}
    </div>
</div>
@endsection