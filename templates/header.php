<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Oswald|Source+Sans+Pro&display=swap');
    </style>
    <link rel="stylesheet" href="./styles/style.css">
    <title>W1 Music: [+title+]</title>
</head>

<body>
    <header>
        <div class="strip-black">
       
            <form action="index.php" method="post">
                <fieldset>
                    <div class="buttons">
                       
                        <label for="language">Language:</label>
                        
                            <!-- Save title value using cleanData -->
                            <input type="radio" name="language" value="en">En</option>
                            <input type="radio" name="language" value="fr">Fr</option>
                        
                    
                        <input type="submit" name="submit" value="Go" />
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="header-container">
            <h1>W1 Music</h1>
            <nav>
                <ul>
                    <!-- The template replaces 'current' to relevant link -->
                    <li><a href="index.php" class="link [+1+]">Home</a></li>
                    <li><a href="index.php?page=songs" class="link [+2+]">Songs</a></li>
                    <li><a href="index.php?page=artists" class="link [+3+]">Artists</a></li>

                </ul>
            </nav>
        </div>

    </header>
    <main>
        <div class="container-heading">
            <h2>[+heading+]</h2>
        </div>