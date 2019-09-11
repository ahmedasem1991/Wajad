Nova.booting((Vue, router) => {
    Vue.component('nova-nexmo', require('./components/Card'))
    router.addRoutes([{
        name: 'NovaNexmoSendSMS2',
        path: '/nexmo-send-sms2',
        component: require('./components/Tool'),
    }, ])
})
