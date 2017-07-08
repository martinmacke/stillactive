var masonries = document.querySelectorAll('.masonry');
for ( var i=0, len = masonries.length; i < len; i++ ) {
  var masonry = masonries[i];
  initMasonry( masonry );
}

function initMasonry( container ) {
  var imgLoad = imagesLoaded( container, function() {
    var msnry = new Masonry( container, {
      itemSelector: '.card',
      columnWidth: '.card',
      isFitWidth: false
    });
  });
}