<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Jadwal Meeting</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    background:
        linear-gradient(rgba(6,10,20,.88), rgba(6,10,20,.88)),
        url('/properti.png') center/cover no-repeat;
    color:white;
    padding:35px;
    overflow-x:hidden;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.header-left h1{
    font-size:34px;
    margin-bottom:6px;
}

.header-left p{
    color:#cbd5e1;
    font-size:14px;
}

.back-btn{
    text-decoration:none;
    color:white;
    padding:12px 20px;
    border-radius:14px;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.12);
    backdrop-filter:blur(10px);
    transition:.3s;
}

.back-btn:hover{
    transform:translateY(-2px);
    background:rgba(255,255,255,.12);
}

/* LAYOUT */
.wrapper{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:25px;
}

/* CARD */
.card,
.info-panel{
    position:relative;
    background:rgba(255,255,255,.07);
    border:1px solid rgba(255,255,255,.1);
    border-radius:28px;
    backdrop-filter:blur(18px);
    overflow:hidden;
}

.card{
    padding:32px;
}

.info-panel{
    padding:24px;
}

/* BORDER NEON */
.card::after,
.info-panel::after{
    content:'';
    position:absolute;
    inset:0;
    padding:1.5px;
    border-radius:28px;

    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.5),
        transparent
    );

    background-size:300% 300%;
    animation:borderRun 8s linear infinite;

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);

    -webkit-mask-composite:xor;
    mask-composite:exclude;

    pointer-events:none;
}

@keyframes borderRun{
    0%{background-position:0% 50%;}
    100%{background-position:300% 50%;}
}

/* FORM */
.form-group{
    margin-bottom:22px;
}

.form-group label{
    display:block;
    margin-bottom:10px;
    color:#e2e8f0;
    font-size:14px;
    font-weight:600;
}

.form-control{
    width:100%;
    padding:15px 16px;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.05);
    color:white;
    outline:none;
    transition:.25s;
}

.form-control::placeholder{
    color:#94a3b8;
}

.form-control:hover{
    border-color:rgba(255,255,255,.2);
}

.form-control:focus{
    border-color:#60a5fa;
    box-shadow:0 0 18px rgba(96,165,250,.25);
    transform:translateY(-2px);
}

textarea.form-control{
    min-height:130px;
    resize:none;
}

.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

/* BUTTON */
.submit-btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    color:white;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
    margin-top:10px;

    box-shadow:0 10px 25px rgba(37,99,235,.35);
}

.submit-btn:hover{
    transform:translateY(-3px) scale(1.01);
}

/* INFO PANEL */
.info-title{
    font-size:20px;
    margin-bottom:20px;
}

.info-box{
    padding:18px;
    border-radius:18px;
    background:rgba(255,255,255,.05);
    margin-bottom:16px;
    border:1px solid rgba(255,255,255,.08);
}

.info-box h3{
    font-size:14px;
    margin-bottom:8px;
    color:#93c5fd;
}

.info-box p{
    font-size:13px;
    color:#cbd5e1;
    line-height:1.6;
}

.status{
    display:inline-block;
    padding:6px 12px;
    border-radius:999px;
    background:rgba(34,197,94,.15);
    color:#4ade80;
    font-size:12px;
    margin-top:10px;
}

/* RESPONSIVE */
@media(max-width:900px){

    .wrapper{
        grid-template-columns:1fr;
    }

}

@media(max-width:768px){

    body{
        padding:18px;
    }

    .header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .card,
    .info-panel{
        padding:22px;
    }

}
</style>
</head>
<body>

<div class="header">

    <div class="header-left">
        <h1>📅 Tambah Jadwal Meeting</h1>
        <p>Kelola jadwal koordinasi direksi & agenda perusahaan</p>
    </div>

    <a href="/jadwal-meeting" class="back-btn">
        ← Kembali
    </a>

</div>

<div class="wrapper">

    <!-- FORM -->
    <div class="card">

        <form method="POST" action="/jadwal-meeting/store">

            @csrf

            <div class="form-group">
    <label>Judul Meeting</label>
    <input type="text"
           name="judul"
           class="form-control"
           placeholder="Contoh : Evaluasi ERP Bulanan"
           value="{{ old('judul') }}"
           required>
</div>

<div class="grid">

    <div class="form-group">
        <label>Tanggal Meeting</label>

        <input type="date"
               name="tanggal"
               class="form-control"
               value="{{ old('tanggal') }}"
               required>

        @error('tanggal')
            <small style="color:#ff6b6b; display:block; margin-top:8px; font-size:13px;">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="form-group">
        <label>Jam Meeting</label>

        <input type="time"
               name="jam"
               class="form-control"
               value="{{ old('jam') }}"
               required>
    </div>

</div>

<div class="form-group">
    <label>Lokasi Meeting</label>

    <input type="text"
           name="lokasi"
           class="form-control"
           placeholder="Contoh : Ruang Direksi Lt.2"
           value="{{ old('lokasi') }}"
           required>
</div>

<div class="form-group">
    <label>Peserta Meeting</label>

    <textarea name="peserta"
              class="form-control"
              placeholder="Direktur Utama, Direktur Operasi, Direktur Keuangan"
              required>{{ old('peserta') }}</textarea>
</div>

       <!-- AGENDA -->
<!-- AGENDA -->
<div class="form-group">

    <label>Agenda Meeting</label>

    <div style="margin-top:12px; display:flex; gap:10px;">

        <a href="/jadwal-meeting/agenda/create"
           class="back-btn"
           style="display:inline-block;">

            + Tambah Agenda

        </a>

    </div>

    {{-- PREVIEW AGENDA --}}
    @if(session('agenda_meeting'))

    <div class="info-box" style="margin-top:18px;">

        <h3 style="
            margin-bottom:14px;
            color:#93c5fd;
            font-size:15px;
        ">
            📝 Agenda Tersimpan
        </h3>

        <pre style="
            white-space:pre-wrap;
            line-height:1.8;
            color:#e2e8f0;
            font-size:14px;
            margin:0;
        ">{{ session('agenda_meeting') }}</pre>

        <button type="button"
                onclick="clearAgenda()"
                style="
                    margin-top:16px;
                    border:none;
                    padding:10px 14px;
                    border-radius:12px;
                    background:rgba(255,0,0,.15);
                    color:#fecaca;
                    cursor:pointer;
                ">

            Hapus Agenda

        </button>

    </div>

    @endif

</div>
            <button type="submit" class="submit-btn">
                Simpan Jadwal Meeting
            </button>

        </form>

    </div>

    <!-- INFO PANEL -->
    <div class="info-panel">

        <h2 class="info-title">📌 Informasi</h2>

        <div class="info-box">
            <h3>Status Meeting</h3>
            <p>Meeting akan tersimpan sebagai draft sebelum dipublikasikan.</p>
            <span class="status">Draft</span>
        </div>

        <div class="info-box">
            <h3>Tips Meeting</h3>
            <p>
                Gunakan judul yang jelas dan tambahkan agenda agar peserta mudah memahami tujuan meeting.
            </p>
        </div>

        <div class="info-box">
            <h3>Reminder</h3>
            <p>
                Pastikan waktu dan lokasi meeting sudah sesuai sebelum disimpan.
            </p>
        </div>

    </div>

</div>
<script>
function clearAgenda(){

    fetch('/clear-agenda', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(() => {
        location.reload();
    });

}
</script>
<script>

/* =========================
   AUTO SAVE FORM
========================= */

const formFields = [
    'judul',
    'tanggal',
    'jam',
    'lokasi',
    'peserta'
];

/* LOAD DATA */
window.addEventListener('DOMContentLoaded', () => {

    formFields.forEach(name => {

        const field = document.querySelector(`[name="${name}"]`);

        if(field){

            const saved = localStorage.getItem(name);

            if(saved){
                field.value = saved;
            }

        }

    });

});

/* SAVE DATA */
formFields.forEach(name => {

    const field = document.querySelector(`[name="${name}"]`);

    if(field){

        field.addEventListener('input', () => {

            localStorage.setItem(name, field.value);

        });

    }

});

/* CLEAR DATA SETELAH SUBMIT */
document.querySelector('form').addEventListener('submit', () => {

    formFields.forEach(name => {

        localStorage.removeItem(name);

    });

});

/* =========================
   CLEAR AGENDA
========================= */

function clearAgenda(){

    fetch('/clear-agenda', {

        method: 'POST',

        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }

    })
    .then(() => {

        location.reload();

    });

}


</script>
<script>

document.querySelector('form').addEventListener('submit', function(e){

    const judul   = document.querySelector('[name="judul"]').value.trim();
    const tanggal = document.querySelector('[name="tanggal"]').value.trim();
    const jam     = document.querySelector('[name="jam"]').value.trim();
    const lokasi  = document.querySelector('[name="lokasi"]').value.trim();
    const peserta = document.querySelector('[name="peserta"]').value.trim();

    const agenda = `{{ session('agenda_meeting') }}`.trim();

    let dataKosong = [];

    if(judul === ''){
        dataKosong.push('Judul Meeting');
    }

    if(tanggal === ''){
        dataKosong.push('Tanggal Meeting');
    }

    if(jam === ''){
        dataKosong.push('Jam Meeting');
    }

    if(lokasi === ''){
        dataKosong.push('Lokasi Meeting');
    }

    if(peserta === ''){
        dataKosong.push('Peserta Meeting');
    }

    if(agenda === ''){
        dataKosong.push('Agenda Meeting');
    }

    if(dataKosong.length > 0){

        e.preventDefault();

        alert(
            'Data berikut belum diisi:\n\n- ' +
            dataKosong.join('\n- ')
        );

    }

});

</script>
<script>
document.querySelectorAll('input, textarea').forEach(el => {
    el.addEventListener('input', () => {

        fetch('/jadwal-meeting/draft', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                judul: document.querySelector('[name="judul"]')?.value,
                tanggal: document.querySelector('[name="tanggal"]')?.value,
                jam: document.querySelector('[name="jam"]')?.value,
                lokasi: document.querySelector('[name="lokasi"]')?.value,
                peserta: document.querySelector('[name="peserta"]')?.value
            })
        });

    });
});
</script>
</body>
</html>
