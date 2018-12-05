<style>
    p {
        padding-left: 1em;
    }
</style>
<?php
/**
 * the database and user should have been already created.
 *
 * == sql cli ==
 *
 *   CREATE DATABASE my_db;
 *   CREATE USER 'my_user'@'localhost' IDENTIFIED BY 'my_password';
 *   GRANT ALL PRIVILEGES ON my_db.* TO 'my_user'@'localhost';
 *   FLUSH PRIVILEGES;
 */

function start($msg)
{
    echo "<p>Start $msg...<br>";
}

function finish($msg)
{
    echo "Finished $msg.</p>";
}

start("connecting database");
require('connect.php');
finish("connecting database");

start("creating all tables and sample data");
$query = file_get_contents("16098537d.sql");

/* execute multi query */
if (mysqli_multi_query($link, $query)) {
    do {
        /* store first result set */
        if ($result = mysqli_store_result($link)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s<br>", $row[0]);
            }
            mysqli_free_result($result);
        }
        /* print divider */
        if (mysqli_more_results($link)) {
            printf("-----------------<br>");
        }
    } while (mysqli_next_result($link));
    finish("creating all tables and sample data");
} else {
	echo "Failed to setup database: ".  mysqli_error( $link );
}


mysqli_close($link);

?>
