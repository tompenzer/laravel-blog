var Prism = require('prismjs/components/prism-core');
var loadLanguages = require('prismjs/components/index.js');

loadLanguages(['css', 'javascript', 'php']);

require('trumbowyg');
require('trumbowyg/dist/plugins/highlight/trumbowyg.highlight');


$('.trumbowyg-form').trumbowyg({
  svgPath: '/images/icons.svg',
  removeformatPasted: true,
  autogrow: true,
  btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['highlight'],
        ['fullscreen']
    ]
});

// Toggle the side navigation
$("#sidenavToggler").click(function(e) {
  e.preventDefault();
  $("body").toggleClass("sidenav-toggled");
});

// Configure tooltips for collapsed side navigation
$('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
  template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
});
