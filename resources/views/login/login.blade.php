<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>F.Tecnology</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* BODY ANIMASI */
body{
    min-height:100vh;
   background:
        linear-gradient(rgba(8,12,25,.76), rgba(8,12,25,.76)),
        url('/properti.png') no-repeat center center;
    background-size:cover;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:10px;

    opacity:0;
    transform:translateX(60px);
    transition:all .6s ease;
}

body.show{
    opacity:1;
    transform:translateX(0);
}

body.exit-left{
    opacity:0;
    transform:translateX(-80px);
}

body.exit-right{
    opacity:0;
    transform:translateX(80px);
}

/* CONTAINER */
.container{
    width:100%;
    max-width:1200px;
}

.content{
    display:flex;
    justify-content:center;
    align-items:stretch; /* penting */
    gap:40px;
    flex-wrap:wrap;
}

/* kolom dibuat stretch penuh */
.col{
    flex:1;
    min-width:420px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

/* 🔥 INI KUNCI PENYAMAAN TINGGI */
.box{
    width:100%;
    max-width:500px;
    flex:1;              /* TAMBAH INI */
    display:flex;        /* TAMBAH INI */
    flex-direction:column; /* TAMBAH INI */
    padding:40px 35px;
    color:#fff;
    border-radius:30px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,.18);
    backdrop-filter:blur(18px);
    box-shadow:0 18px 45px rgba(0,0,0,.28);
}
/* 🔥 TOPBAR DI LUAR CARD */
.topbar-card{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
    margin-bottom:18px;
}

.topbar-card .logo{
    width:55px;
    height:55px;
    background:url('logo.png') no-repeat center center;
    background-size:cover;
    border-radius:14px;
}

.topbar-card .brand{
    color:#fff;
    font-size:20px;
    font-weight:700;
    letter-spacing:2px;
}


/* HEADER */
.header{
    text-align:center;
    margin-bottom:25px;
}

.small-logo{
    width:75px;
    height:75px;
    background:url('logo.png') no-repeat center center;
    background-size:cover;
    border-radius:20px;
    margin:0 auto 15px;
}

h3{
    font-size:32px;
    font-weight:700;
    margin-bottom:6px;
}

.subtitle{
    font-size:14px;
    opacity:.85;
}

/* ALERT */
.alert{
    padding:12px;
    margin-bottom:15px;
    border-radius:12px;
    font-size:14px;
}

.error{
    background:rgba(255,80,80,.20);
    border:1px solid rgba(255,255,255,.18);
    color:#fff;
}

.success{
    background:rgba(0,255,140,.18);
    border:1px solid rgba(255,255,255,.18);
    color:#fff;
}

/* INPUT */
input{
    width:100%;
    padding:14px 16px;
    margin-bottom:12px;
    border-radius:12px;
    border:2px solid rgba(126,255,255,.40);
    background:rgba(255,255,255,.08);
    color:#fff;
    outline:none;
}

input:focus{
    border-color:#7ffcff;
    box-shadow:0 0 15px rgba(127,252,255,.35);
}

/* BUTTON */
button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:linear-gradient(90deg,#4facfe,#00f2fe);
    color:#fff;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
}

button:hover{
    transform:translateY(-2px);
}

/* LINK */
a{
    display:block;
    margin-top:15px;
    text-align:center;
    color:#fff;
    text-decoration:none;
    font-size:14px;
}

a b{
    color:#9ffcff;
}

/* FOOTER */
.footer{
    text-align:center;
    margin-top:15px;
    font-size:12px;
    opacity:.75;
}

@media(max-width:900px){
    .col{
        min-width:100%;
    }
}

.alert{
    transition: all 0.5s ease;
}
#rain{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    pointer-events:none;
    z-index:999; /* ubah ke 999 kalau mau di depan */
}
/* ================= NEON RUNNING BORDER (PUTIH) ================= */

.card,
.box,
.chart-box,
.summary-box{
    position: relative;
    z-index: 1;
}

/* 🔥 layer neon */
.card::after,
.box::after,
.chart-box::after,
.summary-box::after{
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 12px;
    padding: 2px;

    /* 🔥 warna putih neon */
    background: linear-gradient(
        120deg,
        transparent 0%,
        rgba(255,255,255,0.2) 20%,
        #ffffff 40%,
        rgba(255,255,255,0.2) 60%,
        transparent 100%
    );

    background-size: 300% 300%;

    /* 🔥 lebih lambat & smooth */
    animation: borderRun 8s linear infinite;

    /* 🔥 efek glow */
    filter: blur(2px) brightness(1.6);

    /* 🔥 hanya pinggir */
    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;

    pointer-events: none;
}

/* 🔥 animasi jalan */
@keyframes borderRun{
    0%{
        background-position: 0% 50%;
    }
    100%{
        background-position: 300% 50%;
    }
}
/* LOADING LOGIN */
.loading-overlay{
    position:fixed;
    inset:0;
    background:rgba(8,12,25,.72);
    backdrop-filter:blur(6px);
    display:flex;
    justify-content:center;
    align-items:center;
    z-index:99999;

    opacity:0;
    visibility:hidden;
    transition:.3s ease;
}

.loading-overlay.show{
    opacity:1;
    visibility:visible;
}

.loader{
    width:90px;
    height:90px;
    border-radius:50%;

    border:5px solid rgba(255,255,255,.15);
    border-top:5px solid #7ffcff;

    animation:spin 1s linear infinite;

    box-shadow:
        0 0 20px rgba(127,252,255,.45);
}

@keyframes spin{
    100%{
        transform:rotate(360deg);
    }
}
</style>
</head>

<!-- PAGE ANIMASI (TETAP) -->
<script>
document.addEventListener("DOMContentLoaded", function(){

    setTimeout(() => {
        document.body.classList.add("show");
    }, 100);

    document.querySelectorAll(".page-link").forEach(link => {
        link.addEventListener("click", function(e){
            e.preventDefault();

            let tujuan = this.getAttribute("href");

            document.body.classList.remove("show");

            if(tujuan.includes("register")){
                document.body.classList.add("exit-left");
            }else{
                document.body.classList.add("exit-right");
            }

            setTimeout(() => {
                window.location.href = tujuan;
            }, 500);
        });
    });

});
</script>

<body>
    <div class="loading-overlay" id="loadingOverlay">
    <div class="loader"></div>
</div>
<canvas id="rain"></canvas>
<div class="container">

    <div class="content">

        <!-- DIVISI -->
        <div class="col">

            <!-- TOPBAR 1 -->
            <div class="topbar-card">
                <div class="logo"></div>
                <div class="brand">F.TECNOLOGY</div>
            </div>

            <div class="box left-door">

                <div class="header">
                    <div class="small-logo"></div>
                    <h3>Login Divisi</h3>
                    <div class="subtitle">Masuk ke workspace tim divisi</div>
                </div>

                @if(session('error_divisi'))
                    <div class="alert error">{{ session('error_divisi') }}</div>
                @endif

                <form method="POST" action="/login-tim">
                    @csrf
                    <input type="text" name="nama" placeholder="Nama" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="tim_divisi" placeholder="Divisi" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Sign In</button>
                </form>

                <a href="/register-divisi" class="page-link">
                    Belum punya akun? <b>Daftar Divisi</b>
                </a>

                <div class="footer">
                    © 2026 Sistem Informasi | F.Tecnology
                </div>
            </div>
        </div>

        <!-- DIREKSI -->
        <div class="col">

            <!-- TOPBAR 2 -->
            <div class="topbar-card">
                <div class="logo"></div>
                <div class="brand">F.TECNOLOGY</div>
            </div>

            <div class="box right-door">

                <div class="header">
                    <div class="small-logo"></div>
                    <h3>Login Direksi</h3>
                    <div class="subtitle">Akses pengguna internal perusahaan</div>
                </div>

                @if(session('success'))
                    <div class="alert success auto-hide">{{ session('success') }}</div>
                @endif

                @if(session('error_direksi'))
                    <div class="alert error auto-hide">{{ session('error_direksi') }}</div>
                @endif

                <form method="POST" action="/login-direksi" autocomplete="off">
    @csrf

    <input type="text"
           name="nama"
           placeholder="Nama"
           autocomplete="off"
           required>

    <input type="email"
           name="email"
           placeholder="Email"
           autocomplete="off"
           required>

    <input type="text"
           name="jabatan"
           placeholder="Jabatan Direksi"
           autocomplete="off"
           required>

    <input type="text"
           name="id_perusahaan"
           placeholder="ID Perusahaan"
           autocomplete="off"
           required>

    <input type="password"
           name="password"
           placeholder="Password"
           autocomplete="new-password"
           required>

    <button type="submit">Sign In</button>
</form>

                <a href="/register-direksi" class="page-link">
                    Belum punya akun? <b>Daftar Direksi</b>
                </a>

                <div class="footer">
                    © 2026 Sistem Informasi | F.Tecnology
                </div>

            </div>
        </div>

    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const alerts = document.querySelectorAll(".auto-hide");

    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            alert.style.opacity = "0";
            alert.style.transform = "translateY(-10px)";

            setTimeout(() => {
                alert.remove();
            }, 500);

        }, 2000); // 2 detik
    });

});
</script>
<script>
const canvas = document.getElementById('rain');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// ================= HUJAN =================
let drops = [];

for(let i = 0; i < 200; i++){
    drops.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        length: Math.random() * 20 + 10,
        speed: Math.random() * 5 + 5
    });
}

// ================= DRAW =================
function draw(){

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // HUJAN
    ctx.strokeStyle = 'rgba(174,194,224,0.5)';
    ctx.lineWidth = 1;

    drops.forEach(d => {

        ctx.beginPath();
        ctx.moveTo(d.x, d.y);
        ctx.lineTo(d.x, d.y + d.length);
        ctx.stroke();

        d.y += d.speed;

        if(d.y > canvas.height){
            d.y = -20;
            d.x = Math.random() * canvas.width;
        }

    });

    requestAnimationFrame(draw);
}

draw();

// RESPONSIVE
window.addEventListener('resize', () => {

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function(){

    const overlay = document.getElementById("loadingOverlay");

    document.querySelectorAll("form").forEach(form => {

        form.addEventListener("submit", function(){

            overlay.classList.add("show");

        });

    });

});
</script>
</body>

</html>