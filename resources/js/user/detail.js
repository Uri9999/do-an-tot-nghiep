document.addEventListener('alpine:init', () => {
    Alpine.data('detailIndex', () => ({
        item: [],
       
        async init() {
            console.log(1);
            console.log(window.location.href.split('#')[0]);
            await this.getData();
        },
        async getData() {
            let res = await axios({
                url: window.location.href.split('#')[0],
                method: 'GET',
            })
            this.item = res.data.data.product;
            console.log(this.item);
        },

    }))
})
