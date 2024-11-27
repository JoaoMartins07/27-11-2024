<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 1rem;
            margin: 10px 0;
        }
        img {
            display: block;
            margin: 10px auto;
            max-width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalhes do Produto</h1>
        <p><strong>ID:</strong> {{ $produto->id }}</p>
        <p><strong>Referência:</strong> {{ $produto->ref }}</p>
        <p><strong>Título:</strong> {{ $produto->titulo }}</p>
        <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
        <p><strong>Imagem:</strong></p>
        <img src="{{ $produto->imagem }}" alt="{{ $produto->titulo }}">
        <p><strong>Ativo:</strong> {{ $produto->ativo ? 'Sim' : 'Não' }}</p>
        <a href="{{ route('produtos.index') }}" class="back-button">Voltar</a>
    </div>
</body>
</html>
