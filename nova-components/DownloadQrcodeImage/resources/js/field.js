Nova.booting((Vue, router, store) => {
    Vue.component('index-download-qrcode-image', require('./components/IndexField'))
    Vue.component('detail-download-qrcode-image', require('./components/DetailField'))
    Vue.component('form-download-qrcode-image', require('./components/FormField'))
})
