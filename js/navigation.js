/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function( $ ) {
    var clicker = $('#site-navigation ul > li.menu-item-has-children');
//    var clicker = $('#site-navigation ul > li.menu-item-has-children');
    
    clicker.hover( function () {
        
        $('ul.sub-menu', this).stop(true, false).delay(75).fadeIn(400);
        
        
    },function(){
        $('ul.sub-menu', this).stop(true, false).delay(75).fadeOut(400);
    });
    
    
    
})( jQuery );
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();
