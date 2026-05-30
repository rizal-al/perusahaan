<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register Tim Divisi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    background:url('properti.png') no-repeat center center;
    background-size:cover;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:12px;
}

/* CARD */
.container{
    width:100%;
    max-width:480px;
    min-height:720px;

    padding:38px 34px;
    border-radius:30px;
    color:#fff;

    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.18);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    box-shadow:0 18px 45px rgba(0,0,0,.28);

    display:flex;
    flex-direction:column;
    justify-content:flex-start;
}

/* LOGO */
.logo{
    width:72px;
    height:72px;
    margin:0 auto 22px;
    border-radius:20px;
    background:url('logo.png') no-repeat center center;
    background-size:cover;
}

/* TITLE */
.judul{
    text-align:center;
    margin-bottom:34px;
}

.judul h3{
    font-size:34px;
    font-weight:700;
    color:#fff;
    margin-bottom:8px;
}

.judul p{
    font-size:16px;
    color:rgba(255,255,255,.85);
}

/* FORM */
form{
    width:100%;
}

input{
    width:100%;
    padding:17px 18px;
    margin-bottom:14px;
    border-radius:14px;
    border:2px solid rgba(126,255,255,.35);
    background:rgba(255,255,255,.08);
    color:#fff;
    font-size:15px;
    outline:none;
}

input::placeholder{
    color:rgba(255,255,255,.72);
}

input:focus{
    border-color:#7ffcff;
    box-shadow:0 0 15px rgba(127,252,255,.28);
}

/* BUTTON */
button{
    width:100%;
    padding:16px;
    margin-top:6px;
    border:none;
    border-radius:14px;
    cursor:pointer;

    background:linear-gradient(90deg,#4facfe,#00f2fe);
    color:#fff;
    font-size:22px;
    font-weight:700;

    transition:.25s;
}

button:hover{
    transform:translateY(-2px);
    opacity:.95;
}

/* LINK */
a{
    display:block;
    text-align:center;
    margin-top:24px;
    text-decoration:none;
    font-size:18px;
    font-weight:700;
    color:#9ffcff;
}

/* FOOTER */
.footer{
    text-align:center;
    margin-top:auto;
    padding-top:26px;
    font-size:13px;
    color:rgba(255,255,255,.75);
}

/* MOBILE */
@media(max-width:600px){
    .container{
        min-height:auto;
        padding:30px 22px;
        border-radius:24px;
    }

    .judul h3{
        font-size:28px;
    }

    .judul p{
        font-size:14px;
    }
}

body{
    opacity:0;
    transform:translateX(40px);
    transition:all .45s ease;
}

body.show{
    opacity:1;
    transform:translateX(0);
}

body.exit-left{
    opacity:0;
    transform:translateX(-60px);
}

body.exit-right{
    opacity:0;
    transform:translateX(60px);
}
</style>
</head>
<script>
window.onload = function(){
    document.body.classList.add("show");
}

document.querySelectorAll("a").forEach(link=>{
    link.addEventListener("click", function(e){
        e.preventDefault();

        let tujuan = this.href;

        if(tujuan.includes("register")){
            document.body.classList.add("exit-left");
        }else{
            document.body.classList.add("exit-right");
        }

        setTimeout(()=>{
            window.location = tujuan;
        },400);
    });
});
</script>

<body>

<div class="container">

    <div class="logo"></div>

    <div class="judul">
        <h3>Register Divisi</h3>
        <p>Buat akun tim divisi perusahaan</p>
    </div>

    <form method="POST" action="/register-tim">
        @csrf

        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="tim_divisi" placeholder="Tim Divisi" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>
    </form>

    <a href="{{ route('login') }}">Kembali ke Login</a>

    <div class="footer">
        © 2026 Sistem Informasi | F.Tecnology
    </div>

</div>

</body>
</html>