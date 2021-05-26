<?php include_once ("/home/17njyl/public_html/a5/inc/functions.php")?>

<?php
$USER_COMMENT_FORM_NAME = sanitize_form_data("USER_COMMENT_FORM_NAME");
$USER_COMMENT_FORM_TEXT = sanitize_form_data("USER_COMMENT_FORM_TEXT");
?>

<!DOCTYPE html>
<html lang="en">

<?php print_head("Pizza Dough",
    ["https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", 
    "/~17njyl/a5/js/change-quantities.js", 
    "/~17njyl/a5/js/comment-form-validation.js", 
    "/~17njyl/a5/js/hide-directions.js"]); ?>



<body>
    <?php include ("/home/17njyl/public_html/a5/inc/header.php")?>
    <div class="content-container">
        <main>
            <section>
                <?php
                if (isset($_POST['submit'])){
                    $message = "Thank you for your comment!";
                    echo '<div id="thank_you_message">'.$message.'</div>';
                }
                ?>
                <h1>Pizza Dough</h1>
                <p>
                    This is a slightly modified version of King Arthur Flour's <a href="https://www.kingarthurbaking.com/recipes/sourdough-pizza-crust-recipe" >Sourdough Pizza Crust</a> 
                    that substitutes spelt for wheat. 
                </p>    
            </section>
            <section>
                <h2>Ingredients</h2>
                <div class="quantity-button-group">
                    <button class="quantity-button" value="1">Single Batch</button>
                    <button class="quantity-button" value="2">Double Batch</button>
                    <button class="quantity-button" value="3">Triple Batch</button>				
                </div>
                <ul>
                    <li><span id="starter">1</span> cup (give or take) of unfed/discard sourdough starter</li>
                    <li><span id="water">&frac34;</span> cup lukewarm water </li>
                    <li>rounded <span id="yeast">&frac12;</span> tsp. instant or active dry yeast </li>
                    <li><span id="flour">2 &frac12;</span> cups light spelt flour </li>
                    <li><span id="salt">1</span> tsp. salt </li>
                    <li>A little olive oil </li>
                </ul>
            </section>
            <section>
                <h2>Directions</h2>
                <p>Once a step is complete, click its button to hide it.</p>
                <ol class="directions">
                    <li>Turn your oven light on to create a warm place for the pizza dough to rise.</li>
                    <li>Separate your starter into two parts: one to feed and one for the pizza dough. You'll need
                        approximately one cup of starter for this recipe; put it in your largest mixing bowl.
                        <img src="/~17njyl/a5/img/separated_starter.jpeg" alt="separated starter" class="directions-image">
                    </li>
                        
                    <li>Pour the warm water over the starter and then sprinkle the yeast over it. (This will give the
                        yeast a bit of a head start.) 
                        <img src="/~17njyl/a5/img/water_and_yeast_added.jpeg" alt="water and yeast added" class="directions-image">
                    </li>
                    <li>Add the flour and the salt to the bowl. 
                        <img src="/~17njyl/a5/img/flour_and_salt_added.jpeg" alt="flour and salt added" class="directions-image">  
                    </li>
                    <li>Mix everything together with your hands. It will initially look messy before forming into a
                        good dough. 
                        <img src="/~17njyl/a5/img/mixing_by_hand.jpeg" alt="mixing by hand" class="directions-image">
                    </li>
                    <li>The dough should feel slightly sticky but not really stick to your hands or the counter. Don't
                        be afraid to add a little more flour or water to get the right consistency. 
                        <img src="/~17njyl/a5/img/slightly_sticky_dough.jpeg" alt="sticky dough" class="directions-image">
                    </li>
                    <li>Knead the dough for 7 minutes. This is an excellent opportunity to work out any frustration
                        you've been feeling lately. The dough will become smooth and elastic. 
                        <img src="/~17njyl/a5/img/kneaded_dough.jpeg" alt="kneaded dough" class="directions-image">
                    </li>
                    <li>Grease your second-largest mixing bowl with olive oil using your hands. Lightly coat the
                        dough in oil as well, put in the bowl and loosely cover it.
                        <img src="/~17njyl/a5/img/oiled_dough.jpeg" alt="oiled dough" class="directions-image">
                    </li>
                    <li>Loosely cover the bowl, put it in the oven and leave it there for 3-4 hours. 
                        <img src="/~17njyl/a5/img/rising_in_the_oven.jpeg" alt="rising in the oven" class="directions-image">
                    </li>
                    <li>The dough will increase in size and become softer. It's now ready to use. 
                        <img src="/~17njyl/a5/img/risen_dough.jpeg" alt="risen dough" class="directions-image">
                    </li>
                </ol>
            </section>
            <section>
                <h2 id="comment_title">Comments</h2>
                <?php 
                $comment_array = get_user_comments_from_db();
                if (isset($_POST['submit'])){
                    append_user_comment_from_db($comment_array, $USER_COMMENT_FORM_NAME, $USER_COMMENT_FORM_TEXT, $timestamp = null);
                }
                foreach ($comment_array as $comment) : ?>
                    <div class="comment">
                        <div class="comment_name"><?= ($comment[USER_COMMENT_DB_NAME]==null) ? constant("USER_COMMENT_DB_NAME_ANONYMOUS") : $comment[USER_COMMENT_DB_NAME] ?></div>
                        <div class="comment_date"><?= date("M d, Y", $comment[USER_COMMENT_DB_TIMESTAMP]); ?></div>
                        <div><?= $comment[USER_COMMENT_DB_TEXT]; ?></div>
                    </div>
                <?php endforeach; ?>
            </section>

            <?php
            if (!isset($_POST['submit'])) { ?>
            <section>
                <h2 id="form_title">Post a Comment</h2>
                <form id="post_comment" action="" method="post">
                        <div class="input_container">
                            <label for="USER_COMMENT_FORM_NAME">Name: </label>
                            <input type="text" id="USER_COMMENT_FORM_NAME" name="USER_COMMENT_FORM_NAME"/>
                        </div>
                        <div class="input_container">
                            <label for="USER_COMMENT_FORM_TEXT">Comment (Required): </label>
                            <textarea id="USER_COMMENT_FORM_TEXT" name="USER_COMMENT_FORM_TEXT" rows="5" required></textarea>
                        </div>
                        <div class="input_container">
                            <input type="submit" id="submit" name="submit" value="Post" onClick="return confirmCancel()"/>
                        </div>
                </form>
            </section>
            <?php } ?>
        </main>
        <?php include("/home/17njyl/public_html/a5/inc/footer.php")?>
    </div>
</body>
</html>