function deleteProduct( id ){

    const td = event.target;
    const tr = td.parentNode;
    tr.classList.add('opacity');

    if( !id )
        return

    const formDate = new FormData();
    formDate.append('type', 'del');
    formDate.append('id', id);

    fetch( '/controllers/products-controller.php',{
        method: 'post',
        body: formDate,
    }).then( res => res.text() )
    .then( text => {
        tr.remove();
    })

}