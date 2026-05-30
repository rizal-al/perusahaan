<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jadwal Meeting</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

html,body{
    width:100%;
    min-height:100%;
}

body{
    min-height:100vh;
    background:
        linear-gradient(rgba(8,12,25,.84), rgba(8,12,25,.84)),
        url('/properti.png') no-repeat center center;
    background-size:cover;
    background-attachment:fixed;
    color:white;
    padding:30px;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h2{
    font-size:30px;
    font-weight:700;
    letter-spacing:.5px;
}

.back-btn{
    text-decoration:none;
    color:white;
    padding:10px 18px;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.15);
    backdrop-filter:blur(12px);
    transition:.3s;
}

.back-btn:hover{
    background:rgba(255,255,255,0.15);
}

/* TOP BAR */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    gap:15px;
    flex-wrap:wrap;
}

/* SEARCH */
.search-box{
    flex:1;
    min-width:250px;
}

.search-box input{
    width:100%;
    padding:13px 16px;
    border:none;
    outline:none;
    border-radius:14px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.12);
    color:white;
    backdrop-filter:blur(10px);
}

.search-box input::placeholder{
    color:#cbd5e1;
}

/* ADD BUTTON */
.add-btn{
    text-decoration:none;
    color:white;
    padding:12px 20px;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    box-shadow:0 10px 25px rgba(37,99,235,.35);
    transition:.3s;
    font-weight:600;
}

.add-btn:hover{
    transform:translateY(-2px);
}

/* CARD */
.card{
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.12);
    border-radius:28px;
    padding:25px;
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    box-shadow:0 8px 32px rgba(0,0,0,.35);
    overflow:hidden;
}

/* TABLE */
.table{
    width:100%;
    border-collapse:collapse;
}

.table th,
.table td{
    padding:16px 14px;
    text-align:left;
}

.table th{
    background:rgba(255,255,255,0.08);
    color:#e2e8f0;
    font-size:14px;
    letter-spacing:.5px;
}

.table tr{
    border-bottom:1px solid rgba(255,255,255,0.08);
    transition:.2s;
}

.table tr:hover{
    background:rgba(255,255,255,0.05);
}

/* STATUS */
.status{
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
}

.aktif{
    background:rgba(34,197,94,.15);
    color:#4ade80;
    border:1px solid rgba(74,222,128,.3);
}

.selesai{
    background:rgba(239,68,68,.15);
    color:#f87171;
    border:1px solid rgba(248,113,113,.3);
}

/* ACTION BUTTON */
.action{
    display:flex;
    gap:8px;
}

.btn{
    border:none;
    padding:8px 14px;
    border-radius:10px;
    color:white;
    cursor:pointer;
    transition:.2s;
    font-size:13px;
}

.edit{
    background:#2563eb;
}

.delete{
    background:#dc2626;
}

.btn:hover{
    transform:translateY(-2px);
}

/* EMPTY */
.empty{
    text-align:center;
    padding:25px;
    color:#cbd5e1;
}

/* RESPONSIVE */
@media(max-width:768px){

    body{
        padding:18px;
    }

    .header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .top-bar{
        flex-direction:column;
        align-items:stretch;
    }

    .card{
        overflow-x:auto;
    }

    .table{
        min-width:900px;
    }
}
</style>
</head>
<body>

<!-- HEADER -->
<div class="header">

    <h2>📅 Jadwal Meeting</h2>

    <a href="/direktur-utama/home" class="back-btn">
        ← Kembali
    </a>

</div>

<!-- TOP -->
<div class="top-bar">

    <div class="search-box">
        <input type="text" placeholder="Cari jadwal meeting...">
    </div>

    <a href="/jadwal-meeting/create" class="add-btn">
        + Tambah Jadwal
    </a>

</div>

<!-- CARD -->
<div class="card">

   <table class="table">

    <thead>
        <tr>
            <th>No</th>
            <th>Judul Meeting</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Lokasi</th>
            <th>Peserta</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

@forelse($data as $d)

<tr>
    <td>{{ $loop->iteration }}</td>

    <td>{{ $d->judul }}</td>

    <td>{{ $d->tanggal }}</td>

    <td>{{ $d->jam }}</td>

    <td>{{ $d->lokasi }}</td>

    <td>{{ $d->peserta }}</td>

    <td>
        <span class="status aktif">
            {{ $d->status }}
        </span>
    </td>

    <td>
        <div class="action">

            <a href="/jadwal-meeting/agenda/{{ $d->id }}"
   class="btn edit"
   style="text-decoration:none;">
    Lihat Agenda
</a>

           <form action="/jadwal-meeting/delete/{{ $d->id }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin menghapus jadwal meeting ini ?')">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn delete">
        Hapus
    </button>

</form>

        </div>
    </td>
</tr>

@empty

<tr>
    <td colspan="8" class="empty">
        📭 Belum ada jadwal meeting
    </td>
</tr>

@endforelse

</tbody>

</table>

</div>

</body>
</html>