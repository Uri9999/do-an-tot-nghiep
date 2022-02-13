console.log(12345);
document.addEventListener('alpine:init', () => {
    Alpine.data('userIndex', () => ({
        items: [],
        categories: [],
        products: [],
        takes: [3, 6, 9],
        keys:[
            'name',
            'price',
            'new',
        ],
        option: {
            skip: 0,
            take: 9,
            key: 'name',
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
        }
        // async saveData() {
        //     // Prevent double click
        //     $('#btnSubmit').prop("disabled", true);
        //     await axios({
        //             url: location.href + '/store',
        //             method: 'POST',
        //             data: {
        //                 data: this.items,
        //                 condition: this.issetFreecomment
        //             },
        //             headers: {
        //                 'Content-Type': 'application/json'
        //             }
        //         }).then(function(response) {
        //             window.location.href = location.origin + '/question-completed';
        //         })
        //         .catch(function(error) {
        //             $('#btnSubmit').prop("disabled", false);
        //             console.log(error);
        //         });
        // },

    }))
})
