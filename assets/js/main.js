(function($) { "use strict";


		// Bind the submit event for your form
		$('.wp-block-search').submit(function( e ){
		    // Stop the form from submitting
		    e.preventDefault();
            $('#primary').empty();
		    // Get the search term
		    var term = $('.wp-block-search__input ').val();							    


		    // Get post type
		    var pt = 'post';

		    // Make sure the user searched for something
		    if ( term ){
		        $.post( jhAjax.jhajaxurl, { s: term, post_type: pt }, function( data ){
		            // Place the fetched results inside the #primary element

		            $('#primary').html( $(data).find('#primary').children() );
		        });
		    }
           
		});

}(jQuery));