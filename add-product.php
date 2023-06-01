<?php require_once './template-parts/head.php' ?>
<?php require_once './template-parts/header.php' ?>
<?php require_once './template-parts/aside.php' ?>

<main>
    <h1>Add Product </h1>
    <hr>

    <form action="/controllers/products-controller.php" method="post">

        <label>
            <span>Name</span>
            <input type="text" placeholder="Name" required name='name' >
        </label>   

        <label>
            <span>Price</span>
            <input min='10' type="number" placeholder="Price" required name='price' inputmode="numeric">
        </label>    

        <label>
            <span>Stock</span>
            <input type="number" placeholder="Stock" required name='stock' inputmode="numeric">
        </label>

        <input type="hidden" name="type" value="add">
    
        <button>Save</button>
    
    </form>

</main>

<?php require_once './template-parts/footer.php' ?>