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
    $('.actual-price span').text(Intl.NumberFormat('de-DE').format(totalPrice));
    $('input[name=subtotal]').val(totalPrice);

    let discountValue = $('input[name=discount]').val();
    if (discountValue > 0) {
        let actualPrice = calculateActualPrice(totalPrice, discountValue);
        $('.actual-price span').text(Intl.NumberFormat('de-DE').format(actualPrice));
    }

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

async function searchCoupon() {
    console.log(1);
    await axios({
        url: window.location.origin + '/home-user/user/cart/coupon-find/' + $('input[name=coupon_code]').val(),
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
    }).then((response) => {
        console.log(response.data.data);
        $('.discount').removeClass('d-none');
        $('.actual-price').removeClass('d-none');
        let discountValue = response.data.data.coupon.coupon_value;
        let discountCode = response.data.data.coupon.coupon_code;
        $('input[name=discount]').val(discountValue)
        $('input[name=discount_code]').val(discountCode)
        $('.discount span').text(Intl.NumberFormat('de-DE').format(discountValue));
        let subPrice = $('input[name=subtotal]').val();
        let actualPrice = calculateActualPrice(subPrice, discountValue);
        $('.actual-price span').text(Intl.NumberFormat('de-DE').format(actualPrice));
        $('.error-coupon').addClass('d-none');

    }).catch((error) => {
        $('.error-coupon').removeClass('d-none');
        $('input[name=discount_code]').val("")
        $('.discount span').text(0);
        $('.actual-price').addClass('d-none');
        $('.discount').addClass('d-none');
    });
}

function calculateActualPrice(price, discountValue) {
    return price - (price * discountValue) / 100;
}
$('#searchData').click(searchCoupon);
