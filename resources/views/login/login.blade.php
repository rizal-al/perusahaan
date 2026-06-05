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

/* BODY */
body{
    min-height:100vh;
    background:#f4f6f9;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;

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
    align-items:stretch;
    gap:40px;
    flex-wrap:wrap;
}

.col{
    flex:1;
    min-width:420px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

/* CARD */
.box{
    width:100%;
    max-width:500px;
    flex:1;
    display:flex;
    flex-direction:column;

    padding:40px 35px;

    background:#ffffff;
    color:#1f2937;

    border-radius:14px;
    border:1px solid #dbe3ea;

    box-shadow:
        0 4px 10px rgba(0,0,0,.05),
        0 10px 30px rgba(0,0,0,.08);
}

/* TOPBAR */
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
    border-radius:12px;
}

.topbar-card .brand{
    color:#1f2937;
    font-size:20px;
    font-weight:700;
    letter-spacing:1px;
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
    border-radius:18px;
    margin:0 auto 15px;
}

h3{
    font-size:30px;
    font-weight:700;
    margin-bottom:6px;
    color:#111827;
}

.subtitle{
    font-size:14px;
    color:#64748b;
}

/* ALERT */
.alert{
    padding:12px;
    margin-bottom:15px;
    border-radius:10px;
    font-size:14px;
    transition:all .5s ease;
}

.error{
    background:#fee2e2;
    border:1px solid #fecaca;
    color:#991b1b;
}

.success{
    background:#dcfce7;
    border:1px solid #bbf7d0;
    color:#166534;
}

/* INPUT */
input{
    width:100%;
    padding:14px 16px;
    margin-bottom:12px;

    border-radius:8px;
    border:1px solid #cbd5e1;

    background:#fff;
    color:#111827;

    outline:none;
    transition:.2s;
}

input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

/* BUTTON */
button{
    width:100%;
    padding:14px;

    border:none;
    border-radius:8px;

    background:#2563eb;
    color:#fff;

    font-size:15px;
    font-weight:600;

    cursor:pointer;
    transition:.2s;
}

button:hover{
    background:#1d4ed8;
}

/* LINK */
a{
    display:block;
    margin-top:15px;

    text-align:center;
    text-decoration:none;

    font-size:14px;
    color:#475569;
}

a b{
    color:#2563eb;
}

/* FOOTER */
.footer{
    text-align:center;
    margin-top:15px;
    font-size:12px;
    color:#64748b;
}

/* RESPONSIVE */
@media(max-width:900px){
    .col{
        min-width:100%;
    }
}

/* LOADING */
.loading-overlay{
    position:fixed;
    inset:0;

    background:rgba(255,255,255,.75);
    backdrop-filter:blur(4px);

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
    width:70px;
    height:70px;

    border-radius:50%;
    border:4px solid #dbeafe;
    border-top:4px solid #2563eb;

    animation:spin 1s linear infinite;
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