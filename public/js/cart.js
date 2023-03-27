paypal.Buttons({
    createOrder: function (data, actions) {

        // création du tableau contenant la commande
        // packages = les forfaits venant de la session (panier)
        let items = []

        for (let item of cart) {
            items.push({
                name: item.title,
                quantity: item.quantity,
                unit_amount: {
                    value: item.price,
                    currency_code: 'CAD',
                    tax: {
                        value: (item.price * 0.149).toFixed(2),
                        currency_code: 'CAD'
                    }
                }
            })
        }

        // mise en forme de la commande
        const infos_paypal = {
            purchase_units: [{
                items: items,
                amount: {
                    value: (price * 1.149).toFixed(2),
                    breakdown: {
                        tax_total: {
                            value: (price * 0.149).toFixed(2),
                            currency_code: 'CAD'
                        },
                        item_total: {
                            value: price,
                            currency_code: 'CAD'
                        }
                    }
                }
            }]
        }

        // set up de la transaction
        return actions.order.create(infos_paypal);
    },
    onApprove: function (data, actions) {

        // finaliser la transaction
        return actions.order.capture().then(function (details) {

            // redirection vers l'enregistrement dans données dans la bdd
            window.location = "/reservations/store"
        });
    }
}).render('#paypal-button-container');
