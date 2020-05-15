<?php
    $post_details = get_post($post_id);
    //print_r($post_details);

    global $wpdb;
    // Update
    $wpdb->update($wpdb->posts, array(
        'post_title'=> '',
        'post_content'=> '',
        'post_name'=> '',
    ),
    array(
        'id'=>$post_id
    ));

    // Delete
    //$wpdb->delete($wpdb->posts, array( 'id'=> $post_id ));
?>

<div id="wpbody" role="main">
<h1 class="wp-heading-inline">Post Data</h1>
<hr class="wp-header-end">

<form name="post" action="post.php" method="post" id="post">
<div id="titlediv2">
        <label class="" id="title-prompt-text" for="txt_post_title">titre</label>
        <input type="text" class="form-control" name="txt_post_title" id="txt_post_title"
        value="<?php echo $post_details->post_title; ?>">
</div>
<div id="contentdiv">
    <label class="" id="content-prompt-text" for="txt_post_content">content</label>
    <textarea name="txt_post_content" class="form-control" id="txt_post_content">
        <?php echo $post_details->post_content; ?>
    </textarea>
</div>
<div id="namediv">
    <label class="" id="name-prompt-text" for="txt_post_name">slug</label>
    <input type="text" class="form-control" name="txt_post_name" id="txt_post_name"
        value="<?php echo $post_details->post_name; ?>">
</div>
<br />
<button type="submit" name="btnSubmit" class="button button-primary button-large" >Enregistrer</button>
</form>
</div>