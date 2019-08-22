Nova.booting((Vue, router, store) => {
    Vue.component('index-qrcode-generator', require('./components/IndexField'))
    Vue.component('detail-qrcode-generator', require('./components/DetailField'))
    Vue.component('form-qrcode-generator', require('./components/FormField'))
})
