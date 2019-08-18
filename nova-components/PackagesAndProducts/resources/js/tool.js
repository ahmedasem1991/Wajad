Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'packages_and_products',
            path: '/subscribed-users-and-items',
            component: require('./components/Tool'),
        },
    ])
})
