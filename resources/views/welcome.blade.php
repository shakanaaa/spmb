<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .daftar {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .daftar input, .daftar select, .daftar button {
            padding: 10px;
        }
        .daftar button {
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
    </style>
</head>

    </style>
</head>
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="daftar">
            <form action="" method="POST">
           
                    <option value="">Pilih Jurusan</option>
                    <option value="RPL">RPL</option>
                    <option value="boga">Boga</option>
                    <option value="atph">ATPH</option>
                    <option value="busana">Busana</option>
                </select>
                <button type="submit">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>