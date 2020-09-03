
<script type="text/javascript">
  jQuery(function($) {
  //Watch all ajax activity
  $(document).ajaxStart(function() {    
    if ($('#loading-bar').length === 0) {
      $('body').append( $('<div/>').attr('id', 'loading-bar').addClass(_lb.position) );
      /**
       * Random loading bar initial percentage
       */
      _lb.percentage = Math.random() * 30 + 30;
      $("#loading-bar")[_lb.direction](_lb.percentage + "%");
      /**
       * Bump loading percentage between current and 99%
       */
      _lb.interval = setInterval(function() {
        _lb.percentage = Math.random() * ( (100-_lb.percentage) / 2 ) + _lb.percentage;
        $("#loading-bar")[_lb.direction](_lb.percentage + "%");
      }, 500);
    }
  }).ajaxStop(function() {
    clearInterval(_lb.interval);
    $("#loading-bar")[_lb.direction]("101%");
    /**
     * Waits until css transition is finished and removes element from the DOM
     */
    setTimeout( function() {
      $("#loading-bar").fadeOut(300, function() {
        $(this).remove();
      });
    }, 300);
  });
});

/**
 * Main object
 */
var _lb = {}

//Default loading bar position
_lb.position  = 'top';
_lb.direction = 'width'
/**
 * Ajax call
 * accepts callback( response )
 */
_lb.get = function( callback ) {
  _lb.loading = true;
  jQuery.ajax({
    url   : this.href,
    success: function(response) {
      _lb.loading = false;
      if ( typeof(callback) === 'function'  )
        callback( response );
    }
  });
}

jQuery(function($) {
  $('.btn-action').click(function() {
    switch ( $(this).data('action') ) {
      case 'load':
        _lb.get();
        break;
      case 'position':
        _lb.position  = $(this).data('position');
        _lb.direction = $(this).data('direction');
        $('#section-position h1 small').html( _lb.position );
        break;
    }
  });
});
</script>

<style type="text/css">
  #main {
  margin-top: 20px;
}

#loading-bar {
  
  background-color: #cb1414;
  height: 3px;
  width: 0;
  position: fixed;
  z-index: 666000666;
  -webkit-transition:width 500ms ease-out, height 500ms ease-out;
  -moz-transition:width 500ms ease-out, height 500ms ease-out;
  -o-transition:width 500ms ease-out, height 500ms ease-out;
  transition:width 500ms ease-out, height 500ms ease-out;

}

#loading-bar.no-transition { 
  -webkit-transition:none;
  -moz-transition:none;
  -o-transition:none;
  transition:none;
}

#loading-bar.top, #loading-bar.bottom, #loading-bar.left { left: 0;}
#loading-bar.top, #loading-bar.left, #loading-bar.right { top: 0;}
#loading-bar.left, #loading-bar.right { width: 5px; height: 0; }
#loading-bar.bottom { bottom: 0; }
#loading-bar.right { right:0; }
</style>