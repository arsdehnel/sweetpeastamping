var setColor = function( $element ) {
  var $target = $($element.attr('data-selector'));
  var $opacity = $element.attr('data-color-opacity');
  var selValue = $element.val();
  $target.css($element.attr('data-property'),selValue);
  $element.parent().children('.color-value').text(selValue);
};

$(function(){
	$.get('/wp-content/themes/sweetpea2014/includes/client-side-color-picker/widget.html',function(data){
		$('body').append(data);
		$('.element-selector :input').each(function(){
	  		setColor( $(this) );
		});
	});

	$('body').on('change','.element-selector :input',function(){
	  setColor( $(this) );
	});
});