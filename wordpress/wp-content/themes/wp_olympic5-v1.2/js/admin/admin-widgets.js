jQuery(document).ready(function($) {

	"use strict";

	if( $('div[id*="ci_post_type_widget"]').length > 0 ) {

		$('body').on('change', 'select[id*="ci_post_type_widget"][name*="\\[post_type_name\\]"]', function(){

			var post_type_dropdown = $(this);

			$.ajax({
				type: "post",
				url: ThemeWidget.ajaxurl,
				data: {
					action: 'ci_widget_post_type_ajax_get_posts',
					post_type_name: $(this).val(),
					name_field: post_type_dropdown.siblings('.ci_widget_post_type_posts_dropdown').children('select').attr('name')
				},
				dataType: 'text',
				beforeSend: function() {
					post_type_dropdown.siblings('.loading_posts').show();
				}, 
				success: function(response){
					if(response != '') {
						post_type_dropdown.siblings('.ci_widget_post_type_posts_dropdown').html(response);
					}
					else {
						post_type_dropdown.siblings('.ci_widget_post_type_posts_dropdown').children('select').html('');
					}

					post_type_dropdown.siblings('.loading_posts').hide();

				}
			});//ajax		

		});
	}

	//Repeating fields in Schedule widget
	if($('div[id*="ci_schedule_widget"]').length > 0) {

		$('div[id*="ci_schedule_widget"] .tracks').sortable();

		$('#wpbody').on('click', 'div[id*="ci_schedule_widget"] .add-track', function(e) {

			var fieldname = $(this).siblings('.hid_id').data('hidden-name');
			fieldname = fieldname + '[]';
			var field_title = '<label>'+ ThemeWidget.track_title +' <input type="text" class="widefat" name="' + fieldname + '" /></label>';
			var field_subtitle = '<label>'+ ThemeWidget.track_subtitle +' <input type="text" class="widefat" name="' + fieldname + '" /></label>';
			var remove_btn = '<a class="track-remove" href="#">' + ThemeWidget.track_remove + '</a>';

			var html = '<div class="track">' + field_title + field_subtitle + remove_btn + '</div>';

			$(html).hide().appendTo( $(this).prev('.tracks') ).fadeIn();

			$('div[id*="ci_schedule_widget"] .tracks').sortable({
				//update: renumberTracks
			});

			e.preventDefault();
		});
		$('#wpbody').on('click', 'div[id*="ci_schedule_widget"] .track-remove', function(e) {
			$(this).parent('div.track').fadeOut(300, function() {
				$(this).remove();
			});

			e.preventDefault();
		});
	}
});