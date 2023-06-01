<?php require_once './logic/products-logic.php' ?>
<?php
    $id = $_GET['id'];
    $product = getProduct( $id );
    if( !$product ){
        header("location: products.php");
    }
?>
<?php require_once './template-parts/head.php' ?>
<?php require_once './template-parts/header.php' ?>
<?php require_once './template-parts/aside.php' ?>


<main>

    <?php
        if( isset( $_GET['update'])){
            echo "<span class='alert'>The Product has been Saved!</span>";
        }
    ?>
    
    <h1>Edit Product <?= $id ?></h1>
    <hr>

    <form action="/controllers/products-controller.php" method="post">

        <label>
            <span>Name</span>
            <input type="text" placeholder="Name" required name='name' value="<?= $product['name'] ?>">
        </label>   

        <label>
            <span>Price</span>
            <input min='10' type="number" placeholder="Price" required name='price' inputmode="numeric" value="<?= $product['price'] ?>">
        </label>    

        <label>
            <span>Stock</span>
            <input type="number" placeholder="Stock" required name='stock' inputmode="numeric" value="<?= $product['stock'] ?>">
        </label>

        <input type="hidden" name="product-id" value="<?= $product['id']?>">
        <input type="hidden" name="type" value="edit">

        <button>Save</button>
    
    </form>

</main>

<?php require_once './template-parts/footer.php' ?>