<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker register</title>
    <link rel="stylesheet" href="/PCSProject/views/resources/style.css"
</head>
<body>
    
    <main class="container--center">
        <form action="/PCSProject/" class="form" method="post">
            <h1 class="form__headline">Registrace</h1>
            <input type="email" name="email" placeholder="Email" autofocus>
            <input id="password" type="text" name="password" placeholder="Heslo">
            <small class="form__error-message">Zadejte heslo delší než 5 znaků.</small>
            <input id="password" type="text" name="password" placeholder="Potvrdit heslo">
            <button class="button--primary" type="submit">Zaregistrovat se</button>
            <div class="form__footer">
                <p>Již máte účet? <a href="/PCSProject/views/login.html">Přihlaste se</a></p>
            </div>
        </form>
    </main>




    <script src="./resources/script.js"></script>
</body>
</html>