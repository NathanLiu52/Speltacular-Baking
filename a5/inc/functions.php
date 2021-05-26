<?php
/******************************************************************************/
/* Head Element */
/******************************************************************************/


/******************************************************************************/
/* User Comments - Form */
/******************************************************************************/
define("USER_COMMENT_FORM_NAME", "commenter-name");
define("USER_COMMENT_FORM_TEXT", "comment-text");


/******************************************************************************/
/* User Comments - Database */
/******************************************************************************/
define("USER_COMMENT_DB_NAME", "name");
define("USER_COMMENT_DB_NAME_ANONYMOUS", "An Anonymous Baker");
define("USER_COMMENT_DB_TIMESTAMP", "timestamp");
define("USER_COMMENT_DB_TEXT", "text");

/* This function stands in for a database query and returns a similar set 
   of "rows". The keys are defined as constants. */
function get_user_comments_from_db() {
	$user_comment_array = array();
	
	append_user_comment_from_db($user_comment_array,
		null, 
		"This looks great!!! I haven't made it yet, but I'm sure it's amazing!!!!!!!! Five stars!!!!!!!!!!!!!!!!!",
		1611205200);

	append_user_comment_from_db($user_comment_array,
		"Chris Smith",
		"This recipe is terrible. I substituted rice flour for the spelt, oat milk for the water and baking soda for the yeast and it didn't turn out at all. Don't make this!",
		1613106000);
	
	return $user_comment_array;
}

/* This function adds/appends the contents of a comment as a "row" to the 
   given array. */
function append_user_comment_from_db(&$user_comment_array, $commenter_name, $comment_text, $timestamp = null) {
	// If no timestamp was provided, use the current time. 
	if (! $timestamp) {
		$timestamp = time();	
	}
	
	$user_comment_array[] = array(
		USER_COMMENT_DB_NAME => $commenter_name,
		USER_COMMENT_DB_TIMESTAMP => $timestamp,
		USER_COMMENT_DB_TEXT => $comment_text);
}

function print_head($title, $js_paths_array=[]){ ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="/~17njyl/a5/css/styles.css">
        <link rel="stylesheet" href="/~17njyl/a5/css/responsive.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Neucha">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif">
<?php foreach ($js_paths_array as $paths) : ?>
        <script src="<?= $paths ?>"></script>
<?php endforeach; ?>
    </head>
<?php 
}

function sanitize_form_data($name, $input = INPUT_POST, $filter = FILTER_SANITIZE_STRING) {
    $form_data = filter_input($input, $name, $filter);
    if ($form_data) {
        $form_data = trim($form_data);
    }

    return $form_data;
}

