<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Agenda Meeting</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    padding:20px;
    color:white;

    background:
        linear-gradient(rgba(5,10,25,.90), rgba(5,10,25,.92)),
        url('/properti.png') no-repeat center center;

    background-size:cover;
    background-attachment:fixed;
}

/* ================= TOPBAR ================= */

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    gap:15px;
}

.topbar h1{
    font-size:34px;
    font-weight:700;
    letter-spacing:.5px;
}

.back-btn{
    text-decoration:none;
    color:white;
    padding:13px 22px;
    border-radius:16px;

    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.12);

    backdrop-filter:blur(14px);
    transition:.3s ease;
}

.back-btn:hover{
    background:rgba(59,130,246,.25);
    transform:translateY(-2px);
}

/* ================= CARD ================= */

.card{
    width:100%;
    min-height:calc(100vh - 110px);

    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.10);

    border-radius:32px;
    overflow:hidden;

    backdrop-filter:blur(22px);

    box-shadow:
        0 15px 40px rgba(0,0,0,.35),
        inset 0 1px 0 rgba(255,255,255,.04);
}

/* ================= HEADER ================= */

.card-header{
    padding:45px;
    position:relative;

    background:
        linear-gradient(
            135deg,
            rgba(37,99,235,.28),
            rgba(6,182,212,.14)
        );
}

.card-header::after{
    content:"";
    position:absolute;
    inset:0;

    background:
        linear-gradient(
            120deg,
            transparent,
            rgba(255,255,255,.04),
            transparent
        );

    animation:shine 7s linear infinite;
}

@keyframes shine{
    0%{
        transform:translateX(-100%);
    }
    100%{
        transform:translateX(100%);
    }
}

.badge{
    display:inline-block;
    padding:9px 18px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    letter-spacing:.5px;

    background:rgba(255,255,255,.10);
    border:1px solid rgba(255,255,255,.14);

    margin-bottom:22px;
}

.card-header h2{
    font-size:42px;
    margin-bottom:22px;
    position:relative;
    z-index:2;
}

.meta{
    display:flex;
    flex-wrap:wrap;
    gap:15px;
    position:relative;
    z-index:2;
}

.meta-box{
    padding:14px 18px;
    border-radius:18px;

    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.10);

    color:#dbeafe;
    font-size:15px;
}

/* ================= CONTENT ================= */

.content{
    padding:40px;
}

.section{
    margin-bottom:35px;
}

.section-title{
    font-size:22px;
    font-weight:700;
    margin-bottom:18px;
    color:#ffffff;
}

/* ================= BOX ================= */

.info-box{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.08);

    border-radius:26px;

    padding:28px;

    backdrop-filter:blur(10px);

    line-height:1.9;

    color:#f1f5f9;

    font-size:15px;
}

/* ================= AGENDA ================= */

.agenda-box{
    position:relative;
    overflow:hidden;

    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.08);

    border-radius:26px;

    padding:28px;
}

.agenda-box::before{
    content:"";
    position:absolute;
    inset:0;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.03),
            transparent
        );

    animation:borderMove 6s linear infinite;
}

@keyframes borderMove{
    0%{
        transform:translateX(-100%);
    }
    100%{
        transform:translateX(100%);
    }
}

pre{
    position:relative;
    z-index:2;

    white-space:pre-wrap;
    word-wrap:break-word;

    line-height:2;

    font-size:15px;
    color:#f8fafc;
}

/* ================= STATUS BUTTON ================= */

.status-box{
    display:flex;
    flex-wrap:wrap;
    gap:18px;
    margin-top:10px;
}

.status-btn{
    padding:16px 26px;
    border-radius:18px;

    color:white;
    text-decoration:none;
    font-weight:600;
    font-size:15px;

    border:1px solid rgba(255,255,255,.10);

    backdrop-filter:blur(10px);

    transition:.3s ease;

    box-shadow:0 8px 20px rgba(0,0,0,.20);
}

.status-btn:hover{
    transform:translateY(-3px);
}

.btn-blue{
    background:rgba(37,99,235,.90);
}

.btn-green{
    background:rgba(22,163,74,.90);
}

.btn-orange{
    background:rgba(234,88,12,.90);
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    body{
        padding:15px;
    }

    .topbar{
        flex-direction:column;
        align-items:flex-start;
    }

    .topbar h1{
        font-size:26px;
    }

    .card-header{
        padding:28px;
    }

    .card-header h2{
        font-size:30px;
    }

    .content{
        padding:24px;
    }

    .meta{
        flex-direction:column;
    }

    .meta-box{
        width:100%;
    }

    .status-box{
        flex-direction:column;
    }

    .status-btn{
        width:100%;
        text-align:center;
    }

}

</style>
</head>

<body>

<div class="topbar">

    <h1>📋 Detail Agenda Meeting</h1>

    <a href="/jadwal-meeting" class="back-btn">
        ← Kembali
    </a>

</div>

<div class="card">

    <!-- HEADER -->
    <div class="card-header">

        <div class="badge">
            Jadwal Meeting Direksi
        </div>

        <h2>{{ $meeting->judul }}</h2>

        <div class="meta">

            <div class="meta-box">
    📅 Tanggal: 
    {{ \Carbon\Carbon::parse($meeting->tanggal)->format('d-m-Y') }}
</div>

            <div class="meta-box">
                🕒 {{ $meeting->jam }}
            </div>

            <div class="meta-box">
                📍 {{ $meeting->lokasi }}
            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- PESERTA -->
        <div class="section">

            <div class="section-title">
                👥 Peserta Meeting
            </div>

            <div class="info-box">

                {!! nl2br(e($meeting->peserta)) !!}

            </div>

        </div>

        <!-- AGENDA -->
        <div class="section">

            <div class="section-title">
                📝 Agenda Meeting
            </div>

            <div class="agenda-box">

                <pre>{{ $meeting->agenda }}</pre>

            </div>

        </div>

        <!-- STATUS -->
        <div class="section">

            <div class="section-title">
                📌 Status Meeting
            </div>

            <div class="status-box">

                <a href="#"
                   class="status-btn btn-blue">

                    📅 Terjadwal

                </a>

                <a href="#"
                   class="status-btn btn-green">

                    ✅ Selesai

                </a>

                <a href="#"
                   class="status-btn btn-orange">

                    ⏳ Lanjut pada
                    {{ $meeting->tanggal_lanjut }}

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>