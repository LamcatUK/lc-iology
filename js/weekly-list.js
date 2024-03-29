jQuery(function($) {

	var filters = {};
	var buttonFilter;
	// quick search regex
	var qsRegex;
	var $filterCount = $('.filter-count');

	var $container = $('#isotope').isotope({
		itemSelector : '.tb-data-single',
		layoutMode : 'vertical',
		transitionDuration : 0,
		getSortData: {
			genus : '[data-genus]',
			species : '[data-species]',
			price : '[data-price]',
		},
		filter: function() {
			var $this = $(this);
			var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
			var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
			return searchResult && buttonResult;
		},
	});

	var iso = $container.data('isotope');
    
	function updateFilterCount() {
		$filterCount.text( iso.filteredItems.length );
	}
	updateFilterCount();


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
		updateFilterCount();
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
		$buttonGroup.find('i').removeClass('fa-sort-down').removeClass('fa-sort-up');
		$buttonGroup.find('i').addClass('fa-sort');
		$(this).addClass('is-checked');
		
		if($(this).hasClass('desc')){
			$(this).removeClass('desc').addClass('asc');
			$(this).find('.fa').removeClass('fa-sort').removeClass('fa-sort-down').addClass('fa-sort-up');
			$container.isotope({
				sortAscending : false
			});
		} else {
			$(this).removeClass('asc').addClass('desc');
			$(this).find('.fa').removeClass('fa-sort').removeClass('fa-sort-up').addClass('fa-sort-down');
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
		updateFilterCount();
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

		$('.btn-group').each(function(i, buttonGroup) {
			var $buttonGroup = $(buttonGroup);
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$buttonGroup.find('i').removeClass('fa-sort-down').removeClass('fa-sort-up');
			$buttonGroup.find('i').addClass('fa-sort');
		});

		$container.isotope({
			sortBy : 'original-order',
			sortAscending: true
		});
		updateFilterCount();
	});

    $('#clear').on('click',function(){
        $('input.selection:checkbox').prop('checked',false);
        $('#selection').val('');
        $('.selection-count').text('0');
		$('#openModal').hide(300);
		$('#selectionList').text('');
	});


	$('.tb-data-single').on('click', function(){

		var c = $(this).find('input[type="checkbox"]');
        c.prop("checked", !c.prop("checked"));

		var values = [];
        $('input.selection:checkbox:checked').each(function(i){
            values[i] = $(this).val() + '\n';
        });
        var enquire = '';
		$('#selectionList').text('');

        $.each(values, function(index, val) {
            enquire += val;
			$('#selectionList').append('<li>'+val+'</li>');
        });

        $('#selection').val(enquire);
		$('.selection-count').text( values.length );
		values.length > 0 ? $('#openModal').show(300) : $('#openModal').hide(300);

	});

});