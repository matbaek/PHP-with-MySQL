<?php

function find_all_subjects() {
    global $db;

    $sql = "SELECT * FROM subjects ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id) {
    global $db;
    
    $sql = "SELECT * FROM subjects WHERE id='". db_escape($db, $id) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($subject) {
    global $db;

    $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES ('". db_escape($db, $subject['menu_name']) ."', '". db_escape($db, $subject['position']) ."', '". db_escape($db, $subject['visible']) ."')";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function update_subject($subject) {
    global $db;

    $sql = "UPDATE subjects SET menu_name='". db_escape($db, $subject['menu_name']) ."', position='". db_escape($db, $subject['position']) ."', visible='". db_escape($db, $subject['visible']) ."' WHERE id='". db_escape($db, $subject['id']) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects WHERE id='". db_escape($db, $id) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages WHERE id='". db_escape($db, $id) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function insert_page($page) {
    global $db;

    $sql = "INSERT INTO pages (subject_id, menu_name, position, visible) VALUES ('". db_escape($db, $page['subject_id']) ."', '". db_escape($db, $page['menu_name']) ."', '". db_escape($db, $page['position']) ."', '". db_escape($db, $page['visible']) ."')";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function update_page($page) {
    global $db;

    $sql = "UPDATE pages SET subject_id='". db_escape($db, $page['subject_id']) ."', menu_name='". db_escape($db, $page['menu_name']) ."', position='". db_escape($db, $page['position']) ."', visible='". db_escape($db, $page['visible']) ."' WHERE id='". db_escape($db, $page['id']) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages WHERE id='". db_escape($db, $id) ."' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

?>