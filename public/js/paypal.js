// import { createApp, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

// const TotalPriceComponent = {
//     props: ['variableVue'],
//     mounted() {
//         console.log(this.variableVue);
//     },
// };

// // ------------------------------------------------------------------------------------------------
// const app = createApp({
//     setup() {
//         onMounted(function () {
//             paypal.Buttons({
//                 createOrder: function (data, actions) {
//                     // Set up the transaction
//                     return actions.order.create({
//                         purchase_units: [{
//                             amount: {
//                                 value: TotalPriceComponent
//                             }
//                         }]
//                     });
//                 },
//                 onApprove: function (data, actions) {
//                     // Capture the funds from the transaction
//                     return actions.order.capture().then(function (details) {
//                         // Save the details of the transaction in your database

//                         $.ajax({
//                             url: '/reservations/create',
//                             type: 'POST',
//                             data: {
//                                 transaction_id: data.orderID,
//                                 payer_id: data.payerID,
//                                 // package_id: package_id // Replace with the actual ID of the package
//                             },
//                             success: function (response) {
//                                 // Handle the response
//                             }
//                         });
//                     });
//                 }
//             }).render('#paypal-button-container');
//         })
//     }
// })

// // Enregistrer le composant personnalisé avec la méthode "component" de l'application Vue.js
// app.component('total-price-component', TotalPriceComponent);

// // Monter l'application Vue.js sur un élément HTML existant
// app.mount('#app');

import { createApp, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

const TotalPriceComponent = {
    props: ['variableVue'],
    mounted() {
        console.log(this.variableVue);
    },
};

const paypal = createApp({
    setup() {
        onMounted(function () {
            paypal.Buttons({
                createOrder: function (data, actions) {
                    // Set up the transaction
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: this.variableVue.toString()
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    // Capture the funds from the transaction
                    return actions.order.capture().then(function (details) {
                        // Save the details of the transaction in your database

                        $.ajax({
                            url: '/reservations/create',
                            type: 'POST',
                            data: {
                                transaction_id: data.orderID,
                                payer_id: data.payerID,
                                // package_id: package_id // Replace with the actual ID of the package
                            },
                            success: function (response) {
                                // Handle the response
                            }
                        });
                    });
                }
            }).render('#paypal-button-container');
        })
    }
})

// Enregistrer le composant personnalisé avec la méthode "component" de l'application Vue.js
paypal.component('total-price-component', TotalPriceComponent);

// Monter l'application Vue.js sur un élément HTML existant
paypal.mount('#paypal');
