<?php require_once './logic/products-logic.php' ?>
<?php require_once './logic/category-logic.php' ?>
<?php require_once './template-parts/head.php' ?>
<?php require_once './template-parts/header.php' ?>
<?php require_once './template-parts/aside.php' ?>

<?php
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $products = getProducts( $category );
    $categories = getCategories();
?>

<main>

    <?php
        if( isset( $_GET['update'])){
            echo "<span class='alert'>The Product has been Saved!</span>";
        }
    ?>

    <h1> Products </h1>
    <ul class='categories'>
        <?php 
            foreach( $categories as $c ){
                $active = $c['id'] == $category ? 'active' : '';
                echo "<li><a class='$active' href='?category={$c['id']}'>{$c['name']}</a></li>";
            }
        ?>
    </ul>
    <hr>


    <table border='1'>
        <thead>
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 55%;">Name</th>
                <th style="width: 15%;">Price</th>
                <th style="width: 15%;">Stock</th>
                <th style="width: 5%;"></th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($products as $p ) { ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><a href="edit-product.php?id=<?=$p['id']?>"><?= $p['name'] ?></a></td>
                        <td><?= $p['price'] ?></td>
                        <td><?= $p['stock'] ?></td>
                        <!-- <td class='deleteProduct' data-id='<?= $p['id'] ?>'>❌</td> -->
                        <td onclick="deleteProduct(<?= $p['id'] ?>)">❌</td>
                    </tr>
                <?php }
            ?>
        </tbody>

    </table>

</main>

<?php require_once './template-parts/footer.php' ?>
