<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Agenda Meeting</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    padding:32px;
    color:white;
    overflow-x:hidden;

    background:
        radial-gradient(circle at top right, rgba(59,130,246,.25), transparent 45%),
        radial-gradient(circle at bottom left, rgba(6,182,212,.18), transparent 50%),
        linear-gradient(rgba(6,10,20,.88), rgba(6,10,20,.95)),
        url('/properti.png') center/cover no-repeat;

    background-attachment:fixed;
}

/* GLOW */
body::before,
body::after{
    content:'';
    position:fixed;
    width:420px;
    height:420px;
    filter:blur(60px);
    z-index:-1;
}

body::before{
    top:-120px;
    right:-120px;
    background:radial-gradient(circle, rgba(59,130,246,.28), transparent 70%);
}

body::after{
    bottom:-140px;
    left:-120px;
    background:radial-gradient(circle, rgba(6,182,212,.20), transparent 70%);
}

/* LAYOUT */
.page-wrapper{
    display:grid;
    grid-template-columns:minmax(0,1fr) 320px;
    gap:28px;
}

/* HEADER */
.header{
    margin-bottom:26px;
}

.header-title h1{
    font-size:42px;
    font-weight:800;
    line-height:1.1;

    background:linear-gradient(90deg,#fff,#93c5fd,#67e8f9);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.header-title p{
    margin-top:10px;
    color:#cbd5e1;
    font-size:14px;
}

/* BACK BUTTON */
.back-btn{
    position:fixed;
    top:24px;
    right:24px;

    text-decoration:none;
    color:white;

    padding:10px 18px;

    border-radius:14px;

    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.14);

    backdrop-filter:blur(24px);

    transition:.25s ease;

    font-size:14px;
}

.back-btn:hover{
    transform:translateY(-2px);
    background:rgba(255,255,255,.12);
    box-shadow:0 14px 30px rgba(0,0,0,.35);
}

/* ===== GLASS FIX (INI INTI PERBAIKAN) ===== */

.main-card,
.side-card,
.document-box{
    background:rgba(255,255,255,.04); /* 🔥 kunci transparansi */
    border:1px solid rgba(255,255,255,.12);
    backdrop-filter:blur(28px);
    -webkit-backdrop-filter:blur(28px);
}

/* MAIN CARD */
.main-card{
    border-radius:26px;
    padding:28px;

    box-shadow:
        0 25px 60px rgba(0,0,0,.55),
        inset 0 1px 0 rgba(255,255,255,.06);
}

/* ERROR */
.error{
    margin-bottom:18px;
    padding:12px 14px;
    border-radius:14px;
    background:rgba(239,68,68,.12);
    border:1px solid rgba(239,68,68,.22);
    color:#fecaca;
    font-size:14px;
}

/* FORM */
.form-group{
    margin-bottom:22px;
}

.form-group label{
    display:flex;
    gap:8px;
    margin-bottom:12px;
    font-size:14px;
    font-weight:700;
}

/* DOCUMENT */
.document-box{
    border-radius:20px;
    overflow:hidden;
}

/* DOC HEADER */
.doc-header{
    display:flex;
    justify-content:space-between;
    padding:14px 18px;

    border-bottom:1px solid rgba(255,255,255,.08);

    background:rgba(255,255,255,.03);
    backdrop-filter:blur(30px);
}

.doc-title{
    font-size:13px;
    color:#93c5fd;
    font-weight:600;
}

.doc-status{
    font-size:12px;
    padding:5px 10px;
    border-radius:999px;
    background:rgba(59,130,246,.16);
    color:#7dd3fc;
}

/* TEXTAREA */
.agenda-textarea{
    width:100%;
    min-height:520px;

    padding:24px;

    border:none;
    outline:none;
    resize:vertical;

    background:transparent;
    color:white;

    font-size:15px;
    line-height:1.9;
}

.agenda-textarea::placeholder{
    color:#94a3b8;
}

/* BUTTON */
.action-area{
    display:flex;
    justify-content:flex-end;
    margin-top:18px;
}

.submit-btn{
    border:none;
    padding:14px 28px;
    border-radius:16px;

    background:linear-gradient(135deg,#2563eb,#06b6d4);
    color:white;

    font-size:14px;
    font-weight:700;

    cursor:pointer;

    transition:.25s ease;

    box-shadow:0 14px 35px rgba(37,99,235,.35);
}

.submit-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 45px rgba(37,99,235,.45);
}

/* SIDE PANEL */
.side-panel{
    display:flex;
    flex-direction:column;
    gap:16px;

    position:sticky;
    top:24px;
    margin-top:75px;
}

.side-card{
    border-radius:22px;
    padding:20px;

    box-shadow:0 10px 30px rgba(0,0,0,.45);
}

.side-card h3{
    margin-bottom:14px;
    font-size:15px;
    color:#7dd3fc;
}

.side-card ul{
    padding-left:18px;
    line-height:1.9;
    color:#e2e8f0;
    font-size:13px;
}

.status-badge{
    display:inline-flex;
    padding:10px 14px;
    border-radius:999px;

    background:rgba(59,130,246,.16);
    color:#7dd3fc;

    font-size:13px;
    font-weight:600;
}

/* RESPONSIVE */
@media(max-width:1100px){
    .page-wrapper{
        grid-template-columns:1fr;
    }

    .side-panel{
        position:relative;
        margin-top:20px;
    }
}

@media(max-width:768px){
    body{ padding:18px; }

    .header-title h1{ font-size:30px; }

    .main-card{ padding:20px; }

    .agenda-textarea{
        min-height:420px;
        padding:18px;
    }

    .submit-btn{
        width:100%;
    }
}

</style>
</head>

<body>

<a href="/jadwal-meeting/create" class="back-btn">← Kembali</a>

<div class="page-wrapper">

    <div class="left-content">

        <div class="header">
            <div class="header-title">
                <h1>📝 Tambah Agenda Meeting</h1>
            </div>
        </div>

        <div class="main-card">

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/jadwal-meeting/agenda/store">
                @csrf

                <div class="form-group">
                    <label>📌 Dokumen Agenda Meeting</label>

                    <div class="document-box">

                        <div class="doc-header">
                            <div class="doc-title">Agenda Internal Direksi</div>
                            <div class="doc-status">Draft</div>
                        </div>

<textarea name="agenda" required class="agenda-textarea">
{{ session('agenda_meeting') ?? "JUDUL AGENDA MEETING

1.

2.

3.

4.

5." }}
</textarea>

                    </div>
                </div>

                <div class="action-area">
                    <button type="submit" class="submit-btn">
                        Simpan Agenda Meeting
                    </button>
                </div>

            </form>

        </div>

    </div>

    <div class="side-panel">

        <div class="side-card">
            <h3>📌 Tips Agenda</h3>
            <ul>
                <li>Gunakan poin singkat & jelas</li>
                <li>Susun berdasarkan prioritas</li>
                <li>Tentukan tindak lanjut meeting</li>
                <li>Gunakan bahasa formal perusahaan</li>
            </ul>
        </div>

        <div class="side-card">
            <h3>📊 Status Meeting</h3>
            <div class="status-badge">Draft Meeting</div>
        </div>

    </div>

</div>

</body>
</html>