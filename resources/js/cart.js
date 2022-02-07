calculatePrice();
$('.quantity').change(function() {
    // Calculate price for quantity product
    let quantity = $(this).val();
    let price = $(this).parent().parent().find('input[name=price]').val()
    let subPrice = Intl.NumberFormat('de-DE').format(price * quantity)
    $(this).parent().parent().find('input[name=subPrice]').val(price * quantity)
    $(this).parent().parent().find('.subtotal').text(subPrice + 'đ')
    // Calculate total price for all product
    calculatePrice();
});

function calculatePrice() {
    var totalPrice = 0;
    $('input[name=subPrice]').each(function() {
        totalPrice += Number($(this).val())
    });
    $('.total-price').text(Intl.NumberFormat('de-DE').format(totalPrice));
}
