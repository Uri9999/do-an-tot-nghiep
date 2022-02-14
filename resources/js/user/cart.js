calculatePrice();
$('.quantity').change(function() {
    // Calculate price for quantity product
    let quantity = $(this).val();
    let price = $(this).parent().parent().find('input[name=price]').val()
    let subPrice = Intl.NumberFormat('de-DE').format(price * quantity)
    let itemId = $(this).parent().parent().find('input[name=itemId]').val()
    $(this).parent().parent().find('input[name=subPrice]').val(price * quantity)
    $(this).parent().parent().find('.subtotal-cart strong').text(subPrice + '$')
    // Calculate total price for all product
    calculatePrice();
    saveData(itemId, quantity);
});

function calculatePrice() {
    var totalPrice = 0;
    $('input[name=subPrice]').each(function() {
        totalPrice += Number($(this).val())
    });
    $('.subtotal span').text(Intl.NumberFormat('de-DE').format(totalPrice));
    $('.grandtotal span').text(Intl.NumberFormat('de-DE').format(totalPrice));

}

async function saveData(cartId, quantity) {
    // Prevent double click
    console.log(location.href);
    await axios({
        url: location.href,
        method: 'POST',
        data: { data: {cartId, quantity} },
        headers: { 'Content-Type': 'application/json' }
    }).then(function (response) {
        console.log('success');
    })
    .catch(function (error) {
        console.log(error);
    });
}
