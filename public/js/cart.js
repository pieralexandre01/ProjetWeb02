paypal.Buttons({
    createOrder: function (data, actions) {

        let items = []

        for (let item of packages) {
            items.push({
                name: item.title,
                quantity: item.quantity,
                unit_amount: {
                    value: item.price,
                    currency_code: 'CAD',
                    tax: {
                        value: item.price * 0.149,
                        currency_code: 'CAD'
                    }
                }
            })
        }

        const infos_paypal = {
            purchase_units: [{
                items: items,
                amount: {
                    value: price * 1.149,
                    breakdown: {
                        tax_total: {
                            value: price * 0.149,
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

        console.log(infos_paypal)

        // Set up the transaction
        return actions.order.create(infos_paypal);
    },
    onApprove: function (data, actions) {
        // Capture the funds from the transaction
        return actions.order.capture().then(function (details) {
            // Save the details of the transaction in your database
            window.location = "/reservations/create/" + data.orderID + "/" + data.payerID
        });
    }
}).render('#paypal-button-container');
