<!DOCTYPE html>
<html>
<head>
    <title>Academic Eco-Impact Assessment System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            background:linear-gradient(135deg,#2ecc71,#27ae60);
            text-align:center;
        }

        h1{
            color:white;
            font-size:40px;
            font-weight:700;
            margin-bottom:40px;
            text-shadow:2px 2px 4px rgba(0,0,0,0.2);
        }

        .btn{
            background:#f2f2f2;
            color:#27ae60;
            padding:15px 35px;
            border-radius:8px;
            text-decoration:none;
            font-weight:600;
            font-size:18px;
            transition:0.3s;
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
        }

        .btn:hover{
            background:white;
            transform:translateY(-5px);
        }

        @media(max-width:600px){
            h1{
                font-size:24px;
                padding:0 15px;
            }
        }
    </style>
</head>
<body>

<h1>🌿 Academic Eco-Impact Assessment System</h1>

<a href="login.php" class="btn">Enter System</a>

</body>
</html>
