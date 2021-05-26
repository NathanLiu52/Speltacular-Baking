<?php include_once ("/home/17njyl/public_html/a5/inc/functions.php")?>

<!DOCTYPE html>
<html lang="en">

<?php print_head("Recipes"); ?>

<body>
    <?php include ("/home/17njyl/public_html/a5/inc/header.php")?>
    <div class="content-container">
        <main>
            <section>
                <h1>Recipes</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Recipe</th>
                            <th>Dairy-Free</th>
                            <th>Egg-Free</th>
                            <th>Vegeterian</th>
                            <th id="vegan-header">Vegan 
                                <span id="vegan-popup">Vegan recipes don't contain ingredients derived from animals</span>
                            </th>
                            <th>Starter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="/~17njyl/a5/recipe/pizza-dough.php">Pizza Dough</a></td>
                            <td colspan="5">Yes</td>
                        </tr>
                        <tr>
                            <td>Pie Crust</td>
                            <td colspan="2">Yes</td>
                            <td colspan="3">No</td>
                        </tr>
                        <tr>
                            <td>Jelly Roll</td>
                            <td colspan="1">Yes</td>
                            <td colspan="4">No</td>
                        </tr>
                        <tr>
                            <td>Chocolate Pudding Cake</td>
                            <td colspan="1">No</td>
                            <td colspan="2">Yes</td>
                            <td colspan="2">No</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section>  
                <h2>Starter</h2>
                <p>I used King Arthur Flour's recipe for <a href="https://www.kingarthurbaking.com/recipes/sourdough-starter-recipe">Sourdough Starter</a> using 
                    whole spelt flour with excellent results. I now feed it with a mix of
                    &frac13; whole spelt flour and &frac23; light spelt flour. It's a 100% hydration starter; if yours is different then
                    you'll need to adjust the liquid and/or flour levels in the recipes accordingly. 
                </p>
            </section>
        </main>
        <?php include ("/home/17njyl/public_html/a5/inc/footer.php")?>
    </div>
</body>
</html>
