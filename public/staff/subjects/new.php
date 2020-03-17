<?php 
require_once("../../../private/initialize.php"); 
$page_title = 'Create Subject'; 
include(SHARED_PATH . '/staff_header.php'); 


$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set) + 1;
mysqli_free_result($subject_set);

$subject = [];
$subject["position"] = $subject_count;

if(is_post_request()) {
    $subject["menu_name"] = $_POST['menu_name'] ?? "";
    $subject["position"] = $_POST['position'] ?? "";
    $subject["visible"] = $_POST['visible'] ?? "";

    $result = insert_subject($subject);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/subjects/show.php?id=". $new_id));
} else {
?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Subject</h1>

    <form action="" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
        <select name="position">
            <?php 
            for($i = 1; $i <= $subject_count; $i++) {
                echo "<option value=\"{$i}\" ";
                if($subject["position"] == $i) {
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
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" />
      </div>
    </form>

  </div>

</div>

<?php 
}
include(SHARED_PATH . '/staff_footer.php'); 
?>