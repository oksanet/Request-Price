/*
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

define(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'mage/validation',
    ],
    function (
        $,
        modal,
    ) {
        let dataForm = $('#request_form');

        modal({
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'Request Price',
            trigger: '[data-trigger=trigger]',
            buttons: [
                {
                    text: $.mage.__('Send'),
                    class: 'action primary',
                    type: 'submit',
                    click: function () {
                        if (dataForm.validation('isValid')) {
                            dataForm[0].sku.value = $('[itemprop="sku"]').text();
                            let skuOption = $(".swatch-attribute-selected-option");
                            if (skuOption.text()) {
                                skuOption = skuOption.map(function() {
                                    return $( this ).text();
                                }).get().join( "-" );
                                dataForm[0].sku.value += '-' + skuOption;
                            }
                            $.ajax({
                                url: 'request_price/request/save',
                                type: 'post',
                                data: new FormData(dataForm[0]),
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                            });
                            dataForm[0].reset();
                            this.closeModal();
                        }
                    }
                },
                {
                    text: $.mage.__('Close'),
                    class: '',
                    click: function () {
                        this.closeModal();
                    }
                }]
        }, dataForm);
    }
);
