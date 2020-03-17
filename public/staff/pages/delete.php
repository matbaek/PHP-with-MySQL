<?php 
require_once("../../../private/initialize.php"); 
$page_title = 'Delete Page'; 
include(SHARED_PATH . '/staff_header.php'); 

if(!isset($_GET['id']) || $_GET['id'] == "") {
    redirect_to(url_for("/staff/pages/index.php"));
}

$id = $_GET['id'];

$page = [];

if(is_post_request()) {
    $result = delete_page($id);
    redirect_to(url_for("/staff/pages/index.php"));
} else {
    $page = find_page_by_id($id);
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for("/staff/pages/index.php"); ?>">&laquo Back to List</a>
    <div class="page delete">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete this page?</p>
        <p class="item"><?php echo h($page["menu_name"]); ?></p>

        <form action="" method="post">
            <div id="operations">
                <input type="submit" value="Delete Page" />
            </div>
        </form>
    </div>
</div>

<?php 
}
include(SHARED_PATH . '/staff_footer.php'); 
?>