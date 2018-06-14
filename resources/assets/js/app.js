require('./bootstrap');
// Temporarily disabling Vue.js until I figure out what I'm going to do with it.
// require('./vue');

// Copying this method over from vue.js for now pending decision on Vue.js use.
$(document).ready(function() {
    $('[data-confirm]').on('click.confirm', function () {
        return confirm($(this).data('confirm'));
    });
});
