<?php
require_once("includes/header.php");
if(!$session->is_signed_in()){
    header("Location:login.php");
}
if(empty($_GET['id'])){
    header("Location:users.php");
}
$user = User::find_by_id($_GET['id']);
if($user){
    //Werwijderen uit de database
    $user->soft_delete();
    //de image te verwijderen uit de users folders
    $user->delete_user_image();
    header("Location:users.php");
}else{
    header("Location:users.php");
}
include("includes/sidebar.php");
include("includes/content-top.php");

?>

<h1>delete page</h1>

<?php
include("includes/footer.php");
?>