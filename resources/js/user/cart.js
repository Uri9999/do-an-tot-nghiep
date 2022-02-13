document.addEventListener('alpine:init', () => {
    Alpine.data('cartIndex', () => ({
        items: [],

        async init() {
            console.log(window.location.href.split('#')[0]);
            await this.getData();
        },
        async getData() {
            let res = await axios({
                url: window.location.href.split('#')[0] + '/data-cart',
                method: 'GET',
            })
            console.log(res.data.data);
        },

        updateTake(value) {
            this.option.take = value;
            this.getData();
        },

        next() {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.option.skip = this.currentPage;
                this.getData();
            }
        },

        previous() {
            if (this.currentPage < this.totalPage) {
                this.currentPage++;
                this.option.skip = this.currentPage;
                this.getData();
            }
        },

        updateKey(value) {
            this.option.key = value;
            this.getData();
        },

        async addCart(productId) {

            await axios({
                url: window.location.href.split('#')[0] + '/add-cart',
                method: 'POST',
                data: {
                    data: productId,
                },
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                this.showSuccess();
            })
            .catch(function (error) {
                window.location.href = location.origin + '/login';
                console.log(error);
            });
        },

        showSuccess() {
            setTimeout(function () {
                $('.notice').removeClass('d-none')
                $(".notice").addClass('d-block');
                setTimeout(function () {
                    $(".notice").removeClass('d-block');
                    $(".notice").addClass('d-none');
                }, 1000);
            }, 100);
        }
    }))
})
