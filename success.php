<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat d'envoi d'email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-box {
            background-color: #00bfff;
            color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            width: 100%;
            box-sizing: border-box;
        }
        .button {
            background-color: #ffffff;
            color: #00bfff;
            padding: 5px 10px;
	    border: 2px solid #00bfff;
            cursor:pointer;
            margin-top:20px;
            border-radius: 5px;
            text-decoration: none;
	}
        .button:hover{
            background-color: #ffffff;
            color: #00bfff;

    </style>
</head>
<body>

<div class="message-box">
    <h2>Votre email a été envoyé avec succès, nous vous recontacterons dans les meilleurs délai !</h2> 
 <a class="button" href="javascript:history.back()">Retour</a>
</div>

</body>
</html>