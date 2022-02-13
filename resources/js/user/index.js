document.addEventListener('alpine:init', () => {
    Alpine.data('userIndex', () => ({
        items: [],
        categories: [],
        products: [],
        type: 1,
        takes: [3, 6, 9],
        keys: [
            'name',
            'price',
            'new',
        ],
        option: {
            skip: 0,
            take: 9,
            key: 'name',
            categoryId: null,
        },
        total: null,
        totalPage: null,
        currentPage: 1,

        async init() {
            await this.getData();
        },
        async getData() {
            let res = await axios({
                url: window.location.href,
                method: 'GET',
                params: this.option,
            })
            console.log(res.data.data);
            this.categories = res.data.data.categories;
            this.products = res.data.data.products;
            this.total = res.data.data.total;
            this.totalPage = Math.floor(this.total / this.option.take);
        },

        getCatProduct(categoryId) {
            this.option.categoryId = categoryId;
            this.option.skip = 0;
            this.option.take = 9;
            this.getData();
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
