<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

//tento řádek háže warning ale vypadá to že to funguje i bez něj
//use mysqli;

$mysqli = new mysqli("127.0.0.1","root","","tracker");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM activities";
$result = $mysqli -> query($sql);

// Associative array
$activities = $result -> fetch_all(MYSQLI_ASSOC);

echo "<pre>";
var_dump($activities);
echo "</pre>";

// Free result set
$result -> free_result();

$mysqli -> close();








?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./resources/style.css">
</head>
<body>

    <main class="container">
        <div class="wrap">
            <h1>Tracker</h1>
            <a href="#" id="logout" class="button--error">Odhlásit se</a>
        </div>

        <nav class="tabs">
            <div class="navigation">
                <a class="tabs__tab--selected" href="/PCSProject/">Planned</a>
                <a class="tabs__tab" href="/PCSProject/">Finished</a>
            </div>
            <button id="new_activity" class="button--primary" >+ Nová aktivita</button>
        </nav>

        <?php
            foreach($activities as $activity)
            {
                echo '
                <article class="todo--done">
                <div>
                    <img src="" class="todo_img" alt="">
                    <p class="todo_description">'.$activity['type'].'</p>
                    <h1 class="todo_headline">'.$activity['title'].'</h1>
                    <p class="todo_description">'.$activity['description'].'</p>
                </div>
    
                <div>
                    <form action="/PCSProject/delete">
                        <input name="todo_id" type="hidden">
                        <button type="submit" class="button--error">Smazat</button>
                    </form>
                </div>
            </article>'
            ;
            }


        ?>



        <article class="todo">
            <div>
                <img src="" class="todo_img" alt="">
                <p class="todo_description">Typ aktivity</p>
                <h1 class="todo_headline">Název</h1>
                <p class="todo_description">Popis</p>
            </div>

            <div>
                <form action="/PCSProject/update">
                    <input name="todo_id" type="hidden">
                    <button type="submit" class="button--success">Hotovo</button>
                </form>
            </div>
        </article>

        <article class="todo--done">
            <div>
                <img src="" class="todo_img" alt="">
                <p class="todo_description">Typ aktivity</p>
                <h1 class="todo_headline">Název</h1>
                <p class="todo_description">Popis</p>
            </div>

            <div>
                <form action="/PCSProject/delete">
                    <input name="todo_id" type="hidden">
                    <button type="submit" class="button--error">Smazat</button>
                </form>
            </div>
        </article>
    









    </main>



    <div id="modal" class="modal-overlay">
        <form action="/Todolist2024/" class="form" method="post">
            <h1 class="form__headline">Nová aktivita</h1>
            <label for="activities" id="activities">Vyber typ aktivity:</label>
            <select name="activities">
                <option value="run">Běh</option>
                <option value="gym">Posilovna</option>
                <option value="cycling">Cyklistika</option>
                <option value="swimming">Plavání</option>
            </select>
            <input name="activity" id="todo_input" type="text" placeholder="Název aktivity" required autofocus>
            <input name="description" type="text" placeholder="Popis aktivity" required>
            <input name="done" type="hidden" value="0" required>
            <input name="user_id" type="hidden">
            <button class="button--primary" type="submit">Přidat aktivitu</button>
        </form>
    </div>
    




    <script src="/PCSProject/views/resources/modal.js"></script>
</body>
</html>