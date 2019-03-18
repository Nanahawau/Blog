<?php
include "../logic/autoload.php";
$page_title = "Posts";
include '../layouts/header.php';

//Define number of posts per page
$posts_per_page = 2;

//Get current page
if(isset($_GET['pageno'])){
    $pageno = $_GET['pageno'];
}else{
    $pageno = 1;
}


//Calculating offset of limit
$start = ($pageno - 1) * $posts_per_page;


//Count number of posts
$query = "select COUNT(*) from posts";
$results = $conn->query($query);


//Number of results
$number_of_results = $results->fetch_array()[0];


//Number of pages expected
$number_of_pages = ceil($number_of_results / $posts_per_page);



//Selecting Posts from DB with limit
$sql2 = "select posts.title, posts.body, users.fullname, posts.created_at from posts INNER JOIN users ON users.id = user_id ORDER BY posts.id DESC LIMIT $start,$posts_per_page";

//Storing the results in a variable
$posts_result = $conn->query($sql2);

function next_page($pageno, $number_of_pages)
{
    $next = $pageno + 1;
    return ($next <= $number_of_pages) ? $next : false;
}

function prev_page($pageno)
{
    $prev = $pageno - 1;
    return ($prev > 0) ? $prev : false;
}

$next = next_page($pageno, $number_of_pages);
$prev = prev_page($pageno);


?>

<main class="align-items-center">
    <div class="container mt-4">
        <h1 class="font-weight-bold mb-5">
            All Posts
        </h1>
        <?php

        $x = 1;
        while ($row = $posts_result->fetch_assoc()) { ?>
            <?php if ($x > 1): ?>
                <hr>
            <?php endif; ?>
            <div class="row">
                <div class="col-4">
                    <h2>
                        <?= $row['title']; ?>
                    </h2>
                </div>
                <div class="col-8">
                    <?= $row['created_at']; ?>
                </div>
                <p>
                    <?= substr($row['body'], 0, 300) ?>...
                </p>
                <a href="#">continue reading</a>
            </div>
            <?php $x++;
        } ?>


        <?php
        if ($number_of_pages > 1) {

            $url = url('posts');

            echo "<div class=\"pagination\">";
            if ($prev != false) {
                echo "<a href= \"{$url}?pageno={$prev}\"> Prev&laquo; &nbsp; &nbsp;</a>";
            }

            if ($next != false) {
                echo "<a href= \"{$url}?pageno={$next}\"> Next &raquo;</a>";
            }

            echo "</div>";
        }

        ?>
    </div>
</main>

<?php
include '../layouts/footer.php';
?>
