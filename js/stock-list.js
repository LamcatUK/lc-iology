$(function() {

	var filters = {};
	var buttonFilter;
	// quick search regex
	var qsRegex;

	var $container = $('#isotope').isotope({
		itemSelector : '.tb-data-single',
		layoutMode : 'vertical',
		transitionDuration : 0,
		getSortData: {
			genus : '[data-genus]',
			species : '[data-species]',
			variant : '[data-variant]'
		},
		filter: function() {
			var $this = $(this);
			var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
			var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
			return searchResult && buttonResult;
		},
	});
    
	$('#filters select').on('change', function() {
		var $this = $(this);
		// get group key
		var filterGroup = $this.attr('data-filter-group');
		// set filter for group
		//filters[filterGroup] = $this.value;
		filters[filterGroup] = $this.find(':selected').attr('data-filter');
		// combine filters
		var filterValue = '';
		for (var prop in filters) {
			filterValue += filters[prop];
		}
		buttonFilter = concatValues( filterValue );
		$container.isotope();

	});

	// bind sort button click
	$('#sorts').on( 'click', 'button', function() {
		var sortValue = $(this).attr('data-sort-value');
		$container.isotope({ 
			sortBy : sortValue
		});
	});
  
	// add is-checked class
	$('.btn-group').each(function(i, buttonGroup) {
		var $buttonGroup = $(buttonGroup);
		$buttonGroup.on('click', 'button', function() {
		
		$buttonGroup.find('.is-checked').removeClass('is-checked');
		$buttonGroup.find('i').removeClass();
		$(this).addClass('is-checked');
		$(this).find('i').addClass('fa');
		
		if($(this).hasClass('desc')){
			$(this).removeClass('desc').addClass('asc');
			$(this).find('.fa').removeClass('fa-sort-amount-asc').addClass('fa-sort-amount-desc');
			$container.isotope({
				sortAscending : false
			});
		} else {
			$(this).removeClass('asc').addClass('desc');
			$(this).find('.fa').removeClass('fa-sort-amount-desc').addClass('fa-sort-amount-asc');
			$container.isotope({
				sortAscending : true
			});
		}
		});
	});

	// use value of search field to filter
	var $quicksearch = $('.quicksearch').keyup( debounce( function() {
		qsRegex = new RegExp( $quicksearch.val(), 'gi' );
		$container.isotope();
	}) );

	// flatten object by concatting values
	function concatValues( obj ) {
		var value = '';
		for ( var prop in obj ) {
			value += obj[ prop ];
		}
		return value;
	}

	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	var timeout;
	threshold = threshold || 100;
	return function debounced() {
		clearTimeout( timeout );
		var args = arguments;
		var _this = this;
		function delayed() {
			fn.apply( _this, args );
		}
		timeout = setTimeout( delayed, threshold );
	};
	}

	$("#reset").on('click',function(){
		qsRegex = '';
		buttonFilter = '';
		$(".quicksearch").val('');
		$('#by-cat').prop('selectedIndex',0);
		$container.isotope();
	});
  
}(jQuery));