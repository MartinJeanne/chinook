<div id="navbar" class="ui inverted menu">
    <div class="header item">Chinook</div>
    <a class="item" href="index.php">Index</a>
    <a class="item" href="artist.php">Artist</a>
    <a class="item" href="album.php">Album</a>
    <a class="item" href="comment.php">Comment</a>

    <div class="right menu">
        <?php
        session_start();
        $notCU =
            "<div class=\"item\"><div id=\"signup\" class=\"ui primary inverted button\">Signup</div></div>
        <div class=\"item\"><div id=\"login\" class=\"ui inverted button\">Login</div></div>";
        if (isset($_SESSION["CU_id"])) {
            include('../services/PDO_connection.php');
            $sql = "SELECT id FROM user WHERE id = " . $_SESSION["CU_id"] . ";";
            $req = $bdd->query($sql);
            if ($req->rowCount() > 0) {
                $CU =
                    "<div class=\"item\"><div id=\"CU\">" . $_SESSION["CU_username"] . "</div></div>
                <div class=\"item\"><div onclick=\"location.href='../services/logout.php';\" class=\"ui inverted button\">Logout</div></div>";
                echo $CU;
            } else {
                unset($_SESSION["CU_id"]);
                echo $notCU;
            }
        } else {
            echo $notCU;
        }
        if (isset($_SESSION["errorMessage"])) {
            echo '<script type="text/javascript">',
                'const errorText = "' . $_SESSION["errorMessage"] . '";',
                '</script>';
            unset($_SESSION["errorMessage"]);
        }
        ?>
    </div>
</div>