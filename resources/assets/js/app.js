
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
$ = require('jquery');
Swal = require('sweetalert2');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

/**
 * Custom Jquery
 */
// news pagination
$('.shared-news .pagination').addClass('justify-content-center w-100');
$('.shared-news .pagination span').addClass('page-link');
$('.shared-news .pagination a').addClass('page-link');


/**
 * Ratings
 **/
var StarRating = require('vue-star-rating');
Vue.component('star-rating', StarRating.default);
new Vue({
    el: '#app',
});
$('.shared-product-details .modal-review-submit').on('click', function (e) {
    if ($('.vue-star-rating-rating-text').html().trim() > 0) {
        $('.shared-product-details input[id="rating"]').val( $('.vue-star-rating-rating-text').html().trim() );
    } else {
        e.preventDefault();
        $('.shared-product-details input[id="rating"]').val('');
        $('.shared-product-details input[id="rating"]').closest('div').addClass('has-error');
        $('.shared-product-details .rating-help-block').show();

    }
});

/**
 * Change in price based on quantity
 * */
$('.shared-product-details .price')
$('.shared-product-details #quantity').on('change', function () {
   var qty = $(this).val();
   var base_price = ($('.shared-product-details .price-container').attr('cs-data'));
   var new_price = qty * base_price;

   if (qty != '') {
       $('.shared-product-details .price').html( addCommaDecimals(new_price) );
       $('.shared-product-details #price').val(new_price);
   } else {
       $('.shared-product-details .price').html( addCommaDecimals(base_price) );
       $('.shared-product-details #price').val(base_price);
   }
});

function addCommaDecimals(num){
    var num = parseFloat(num).toFixed(2);
    //Seperates the components of the number
    var n= num.toString().split(".");
    //Comma-fies the first part
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //Combines the two sections
    return n.join(".");
}


/**
 * product details page
 * Wishlist
 * */
// ajax request to add product to wishlist
$('.shared-product-details #wishlistBtn').on('click', function () {
    addToCartWishlist($(this), '../wishlist');
});

/**
 * product details page
 * Carts
 * */
// ajax request to add product to carts
$('.shared-product-details #cartBtn').on('click', function () {
    addToCartWishlist($(this), '../carts');
});


/**
 * Wishlist page
 * */
// ajax request to add product to carts
$('.shared-wishlist .form-add-to-cart #cart-submit').on('click', function () {
    addToCartWishlist($(this), '../carts');
});

/**
 * Cart
 * */
// ajax request to remove product to carts
$('.cart-modal form[id^="delete-form-"] .delete-cart-item').on('click', function () {
    var token = $(this).closest('form').find('input[name="_token"]').val();
    var method = $(this).closest('form').find('input[name="_method"]').val();
    var id =  $(this).closest('form').find('#item').val();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );

            $.ajax({
                type: 'DELETE',
                url: '../carts/'+id,
                dataType: 'JSON',
                data: {
                    '_token': token,
                    '_method': method,
                    'id': id,
                },
                success: function (data) {
                    location.reload();
                }
            });
        }
    })



});

$('.cart-checkout').click(function() {
    $('.modal-title').html('SHIPPING INFO');
    $('.carts').hide();
    $('.shopping-info').show();
});

$('.shopping-continue').click(function() {
    var checker = 0;
    $.each( $('.shopping-info input:required'),function(i, el) {
        if ( !$(el).val() ) {
            checker++;
        }

        if ( $(el).attr('name') === 'email' ) {
            var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
            if ( !pattern.test( $(el).val() ) ) {
                checker++;
            }
        }
    });
    $.each( $('.shopping-info textarea:required'),function(i, el) {
        if ( !$(el).val() ) {
            checker++;
        }
    });

    if (checker > 0) {
        alert('All required fields must not be blank. \nEmail must be valid.');
    } else {
        $('.modal-title').html('PAYMENT & SUMMARY');
        $('.shopping-info').hide();
        $('.payment').show();
    }
});

$('#payment_method').change(function() {
    if ($(this).val() === 'bank_deposit') {
        $('.cc-info').hide();
        $('.bank-deposit-info').show();
        $('.cc-info #cc_type').attr('required', false);
        $('.cc-info #cc_number').attr('required', false);
        $('.cc-info #cc_expiry').attr('required', false);
    } else if ($(this).val() === 'cc') {
        $('.bank-deposit-info').hide();
        $('.cc-info').show();
        $('.cc-info #cc_type').attr('required', true);
        $('.cc-info #cc_number').attr('required', true);
        $('.cc-info #cc_expiry').attr('required', true);
    } else {
        $('.bank-deposit-info').hide();
        $('.cc-info').hide();
        $('.cc-info #cc_type').attr('required', false);
        $('.cc-info #cc_number').attr('required', false);
        $('.cc-info #cc_expiry').attr('required', false);
    }
});

$('.cart-final-btn').click(function(){
    if ( $('#payment_method').val() ) {
        Swal.fire({
            type: 'success',
            title: 'Your order has been listed in transactions!',
        })
    }
});

function addToCartWishlist(object, url) {
    var token = object.closest('form').find('input[name="_token"]').val();
    var qtn = object.closest('form').find('#quantity').val();
    var _price = object.closest('form').find('#price').val();
    var user_id = object.closest('form').find('#user_id').val();
    var product_id = object.closest('form').find('#product_id').val();

    if ( !qtn ) {
        alert('Please select a quantity');
    } else {
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': token,
                'quantity': qtn,
                'price': _price,
                'users_id': user_id,
                'products_id': product_id,
            },
            success: function (data) {
                $('.alert-modal-sm .modal-body p').html(data);
                $('.alertBtn').click();
            }
        });
    }
}


/**
 * Inventory, wishlist, carts
 * */
//delete product
$('.delete-x').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {

            var id = $(this).attr('cb-data');
            $('#delete-form-'+id).submit();

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })


});

/**
 * Reload page after modal close
 * */
$('.alert-modal-sm').on('hidden.bs.modal', function () {
    location.reload();
});


/**
 * dropdown on cart and edit profile
 * */
$('.shopping-info #city').on('change', function(e) {
    cascadeBarangay( '.shopping-info', $(this).val() );
});

$('.shared-profile-edit #city').on('change', function(e) {
    cascadeBarangay( '.shared-profile-edit', $(this).val() );
});

function cascadeBarangay(classname, pick){
    // place barangay on city
    var barangay = {
        'Las Piñas': [
            'Almanza Uno',
            'Daniel Fajardo',
            'Elias Aldana',
            'Ilaya',
            'Manuyo Uno',
            'Pamplona Uno',
            'Pulang Lupa Uno',
            'Talon Uno',
            'Zapote',
            'Almanza Dos',
            'C.A.A. - BF International',
            'Manuyo Dos',
            'Pamplona Dos',
            'Pamplona Tres',
            'Pilar',
            'Pulang Lupa Dos',
            'Talon Dos',
            'Talon Tres',
            'Talon Kuatro',
            'Talon Singko',
        ],
        'Muntinlupa': [
            'Alabang',
            'Ayala',
            'Bayanan',
            'Buli',
            'Cupang',
            'Poblacion',
            'Putatan',
            'Sucat',
            'Tunasan',
        ],
        'Parañaque': [
            'Baclaran',
            'Don Galo',
            'La Huerta',
            'San Dionisio',
            'San Isidro',
            'Sto. Nino',
            'Tambo',
            'Vitalez',
            'BF Homes',
            'Don Bosco',
            'Marcelo Green',
            'Merville',
            'Moonwalk',
            'San Antonio',
            'San Martin de Porres',
            'Sun Valley',
        ],
    };

    if ( pick ) {
        console.log(barangay[pick]);
        $(classname + ' #barangay').empty();
        $(classname + ' #barangay').append('<option value="">--Select--</option>');
        $.each(barangay[pick], function(key, value) {
            $(classname + ' #barangay').append('<option value="'+ value +'">' + value + '</option>');
        });
    }
}
