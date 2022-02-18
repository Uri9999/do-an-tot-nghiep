// document.addEventListener('alpine:init', () => {
//     Alpine.data('couponIndex', () => ({
//         option: {
//             coupon_code: ''
//         },
//         showError: false,
//         showPrice: false,
//         coupon: '',

//         async init() {
//         },
//         async searchData() {
//             await axios({
//                 url: window.location.origin + '/home-user/user/cart/coupon-find/' + this.option.coupon_code,
//                 method: 'GET',
//                 headers: { 'Content-Type': 'application/json' }
//             }).then((response) => {
//                 this.coupon = response.data.data.coupon;
//                 console.log(this.coupon);
//                 this.showPrice = true;
//             }).catch((error) => {
//                 this.showError = true;
//             });
//         },

//         calculatePrice($value) 

//     }))
// })
