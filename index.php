<?php

require_once ("includes/header.php");
require_once ("includes/navbar.php");
require_once ("admin/includes/init.php");//To connect to the database


/*// Query to fetch all photos
$photos = Photo::find_all();

// Loop through photos
foreach($photos as $photo) {

    // Display each photo
    echo "<img src='admin" . DS . $photo->picture_path() ."'>";
    // Link to detail page, passing photo id in url
    echo "<a href='blogdetail.php?id=" . $photo->id . "'>View</a>";

}*/

$photos = Photo::find_all();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php foreach($photos as $photo):?>
                <a href="blogdetail.php?id=<?php echo $photo->id; ?>">
                    <img src="<?php echo 'admin'.DS. $photo->picture_path(); ?>" class="img-thumbnail" alt="..." width="300" height="300">
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>




 <h1> Dit is de index pagina</h1>



<?php

require_once ("includes/footer.php");


?>
