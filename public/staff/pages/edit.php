<?php 
require_once("../../../private/initialize.php"); 
$page_title = 'Edit Page'; 
include(SHARED_PATH . '/staff_header.php'); 

if(!isset($_GET['id']) || $_GET['id'] == "") {
    redirect_to(url_for("/staff/pages/index.php"));
}

$id = $_GET['id'];

if(is_post_request()) {
    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? "a";
    $page['menu_name'] = $_POST['menu_name'] ?? "";
    $page['position'] = $_POST['position'] ?? "";
    $page['visible'] = $_POST['visible'] ?? "";

    $result = update_page($page);
    redirect_to(url_for("/staff/pages/show.php?id=". $id));
} else {
    $page = find_page_by_id($id);

    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
    <div class="page edit">
        <h1>Edit Page</h1>

        <form action="" method="post">
            <dl>
                <dt>Subject ID</dt>
                <dd><input type="text" name="subject_id" value="<?php echo h($page['subject_id']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
            </dl>
            <dl>
            <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php 
                        for($i = 1; $i <= $page_count; $i++) {
                            echo "<option value=\"{$i}\" ";
                            if($page["position"] == $i) {
                                echo "selected";
                            }
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
            <dt>Visible</dt>
              <dd>
                  <input type="hidden" name="visible" value="0" />
                  <input type="checkbox" name="visible" value="1" <?php if($page['visible'] == "1") { echo "checked"; } ?> />
              </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Page" />
            </div>
        </form>
    </div>
</div>

<?php 
}
include(SHARED_PATH . '/staff_footer.php'); 
?>