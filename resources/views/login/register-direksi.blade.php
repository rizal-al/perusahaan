<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register Direksi</title>
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


.container{
    width:100%;
    max-width:500px;      /* samakan lebar card seperti gambar */
    
    padding:38px 34px;    /* isi dalam proporsional */
    color:#fff;
    border-radius:30px;

    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,.18);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    box-shadow:0 18px 45px rgba(0,0,0,.28);

    display:flex;
    flex-direction:column;
    justify-content:flex-start;   /* isi mulai dari atas seperti gambar */
}

/* logo */
.logo{
     width:75px;
    height:75px;
    background:url('logo.png') no-repeat center center;
    background-size:cover;
    border-radius:20px;
    margin:0 auto 15px;
}

/* judul */
.title-direksi{
    text-align:center;
    font-size:32px;
    font-weight:700;
    margin-bottom:10px;
}

.sub{
    text-align:center;
    font-size:17px;
    opacity:.88;
    margin-bottom:40px;
}

/* alert */
.alert{
    padding:14px;
    border-radius:12px;
    margin-bottom:18px;
    font-size:14px;
}

.error{
    background:rgba(255,80,80,.20);
    border:1px solid rgba(255,255,255,.18);
    color:#fff;
}

/* form */
form{
    width:100%;
    max-width:850px;
    margin:auto;
}

/* input */
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

input::placeholder{
    color:rgba(255,255,255,.78);
}

input:focus{
    border-color:#7ffcff;
    box-shadow:0 0 18px rgba(127,252,255,.35);
}

/* tombol */
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
    opacity:.92;
    transform:translateY(-2px);
}

/* link */
a{
    display:block;
    text-align:center;
    margin-top:25px;
    text-decoration:none;
    color:#fff;
    font-size:16px;
}

.link-login{
    color:#9ffcff;
    font-weight:700;
}

/* footer */
.footer{
    text-align:center;
    margin-top:30px;
    font-size:13px;
    opacity:.75;
}

@media(max-width:700px){
    .container{
        padding:35px 22px;
        min-height:auto;
    }

    .title-direksi{
        font-size:32px;
    }

    .logo{
        width:80px;
        height:80px;
    }

    form{
        max-width:100%;
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

    <h3 class="title-direksi">Register Direksi</h3>
    <div class="sub">Buat akun direksi perusahaan</div>

    @if(session('error'))
        <div class="alert error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/register-direksi">
        @csrf

        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <input type="text" name="id_perusahaan" placeholder="ID Perusahaan" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>
    </form>

    <a href="{{ route('login') }}" class="link-login">
        Kembali ke Login
    </a>

    <div class="footer">
        © 2026 Sistem Informasi | F.Tecnology
    </div>

</div>

</body>
</html>