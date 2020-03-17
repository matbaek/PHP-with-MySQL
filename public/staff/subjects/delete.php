<?php 
require_once("../../../private/initialize.php"); 
$page_title = 'Delete Subject'; 
include(SHARED_PATH . '/staff_header.php'); 

if(!isset($_GET['id']) || $_GET['id'] == "") {
    redirect_to(url_for("/staff/subjects/index.php"));
}

$id = $_GET['id'];

$subject = [];

if(is_post_request()) {
    $result = delete_subject($id);
    redirect_to(url_for("/staff/subjects/index.php"));
} else {
    $subject = find_subject_by_id($id);
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for("/staff/subjects/index.php"); ?>">&laquo Back to List</a>
    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject["menu_name"]); ?></p>

        <form action="" method="post">
            <div id="operations">
                <input type="submit" value="Delete Subject" />
            </div>
        </form>
    </div>
</div>

<?php 
}
include(SHARED_PATH . '/staff_footer.php'); 
?>