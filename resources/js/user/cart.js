document.addEventListener('alpine:init', () => {
    Alpine.data('cartIndex', () => ({
        items: [],
        quantityNumber: [
            1, 2, 3,
        ],
        subTotal: 0,

        async init() {
            await this.getData();
        },
        async getData() {
            let res = await axios({
                url: window.location.href.split('#')[0] + '/data-cart',
                method: 'GET',
            })
            this.items = res.data.data.cart;
            this.calculateSubTotal();
        },

        updatePrice(element, index) {
            let item = this.items[index];
            let quantity = element.value;
            let classItem = '.product-' + item.product.id;
            let totalPrice = quantity * item.product.prod_price;
            $(classItem).text(totalPrice);
            item.total_price = totalPrice;
            this.calculateSubTotal();
        },

        async removeCart(cartId) {
            await axios({
                url: window.location.href.split('#')[0] + '/remove-cart',
                method: 'POST',
                data: {
                    data: cartId,
                },
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                this.getData();
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        calculateSubTotal() {
            this.subTotal = this.items.reduce(function(accumulator, currentValue, currentIndex, array) {
                return accumulator += currentValue.total_price;
            }, 0);
        }

    }))
})
