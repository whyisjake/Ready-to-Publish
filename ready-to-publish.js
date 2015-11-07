(function($) {

	jQuery.fn.shake = function(intShakes, intDistance, intDuration) {
		this.each(function() {
			$(this).css({
				position: 'relative'
			});
			for (var x = 1; x <= intShakes; x++) {
				$(this).animate({
					left: (intDistance * -1)
				}, (((intDuration / intShakes) / 4))).animate({
					left: intDistance
				}, ((intDuration / intShakes) / 2)).animate({
					left: 0
				}, (((intDuration / intShakes) / 4)));
			}
		});
		return this;
	};

	$(function() {

		// Add a hook when they click to update/publish post that
		// will use a dialog box to ensure that the post gets saved.
		$( '#publish' ).click( function() {

			var exist = $( '#ready_to_publish' ).length;

			if ( !exist ) {
				return true;
			}

			var ready_to_publish = $( '#ready_to_publish:checked').length;

			if ( ready_to_publish ) {
				return true;
			}

			else {
				$( '.ready_to_publish_label' ).css( 'font-weight', 'bold' ).shake( 2, 13, 250 );
				return false;
			}

		});
	});

}(jQuery));