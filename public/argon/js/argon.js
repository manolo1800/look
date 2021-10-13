/*!

=========================================================
* Argon Dashboard - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

//
// Bootstrap Datepicker
//

'use strict';

var Datepicker = (function() {

	// Variables

	var $datepicker = $('.datepicker');


	// Methods

	function init($this) {
		var options = {
			disableTouchKeyboard: true,
			autoclose: false
		};

		$this.datepicker(options);
	}


	// Events

	if ($datepicker.length) {
		$datepicker.each(function() {
			init($(this));
		});
	}

})();

//
// Icon code copy/paste
//

'use strict';

var CopyIcon = (function() {

	// Variables

	var $element = '.btn-icon-clipboard',
		$btn = $($element);


	// Methods

	function init($this) {
		$this.tooltip().on('mouseleave', function() {
			// Explicitly hide tooltip, since after clicking it remains
			// focused (as it's a button), so tooltip would otherwise
			// remain visible until focus is moved away
			$this.tooltip('hide');
		});

		var clipboard = new ClipboardJS($element);

		clipboard.on('success', function(e) {
			$(e.trigger)
				.attr('title', 'Copied!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')

			e.clearSelection()
		});
	}


	// Events
	if ($btn.length) {
		init($btn);
	}

})();

//
// Form control
//

'use strict';

var FormControl = (function() {

	// Variables

	var $input = $('.form-control');


	// Methods

	function init($this) {
		$this.on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
	}


	// Events

	if ($input.length) {
		init($input);
	}

})();

//
// Google maps
//

var $map = $('#map-canvas'),
    map,
    lat,
    lng,
    color = "#5e72e4";

function initMap() {

    map = document.getElementById('map-canvas');
    lat = map.getAttribute('data-lat');
    lng = map.getAttribute('data-lng');

    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 12,
        scrollwheel: false,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":color},{"visibility":"on"}]}]
    }

    map = new google.maps.Map(map, mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'Hello World!'
    });

    var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
        '<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}

if($map.length) {
    google.maps.event.addDomListener(window, 'load', initMap);
}

// //
// // Headroom - show/hide navbar on scroll
// //
//
// 'use strict';
//
// var Headroom = (function() {
//
// 	// Variables
//
// 	var $headroom = $('#navbar-main');
//
//
// 	// Methods
//
// 	function init($this) {
//
//     var headroom = new Headroom(document.querySelector("#navbar-main"), {
//         offset: 300,
//         tolerance: {
//             up: 30,
//             down: 30
//         },
//     });
//
//
//
// 	// Events
//
// 	if ($headroom.length) {
// 		headroom.init();
// 	}
//
// })();

//
// Navbar
//

'use strict';

var Navbar = (function() {

	// Variables

	var $nav = $('.navbar-nav, .navbar-nav .nav');
	var $collapse = $('.navbar .collapse');
	var $dropdown = $('.navbar .dropdown');

	// Methods

	function accordion($this) {
		$this.closest($nav).find($collapse).not($this).collapse('hide');
	}

    function closeDropdown($this) {
        var $dropdownMenu = $this.find('.dropdown-menu');

        $dropdownMenu.addClass('close');

    	setTimeout(function() {
    		$dropdownMenu.removeClass('close');
    	}, 200);
	}


	// Events

	$collapse.on({
		'show.bs.collapse': function() {
			accordion($(this));
		}
	})

	$dropdown.on({
		'hide.bs.dropdown': function() {
			closeDropdown($(this));
		}
	})

})();


//
// Navbar collapse
//


var NavbarCollapse = (function() {

	// Variables

	var $nav = $('.navbar-nav'),
		$collapse = $('.navbar .collapse');


	// Methods

	function hideNavbarCollapse($this) {
		$this.addClass('collapsing-out');
	}

	function hiddenNavbarCollapse($this) {
		$this.removeClass('collapsing-out');
	}


	// Events

	if ($collapse.length) {
		$collapse.on({
			'hide.bs.collapse': function() {
				hideNavbarCollapse($collapse);
			}
		})

		$collapse.on({
			'hidden.bs.collapse': function() {
				hiddenNavbarCollapse($collapse);
			}
		})
	}

})();

//
// Form control
//

'use strict';

var noUiSlider = (function() {

	// Variables

	// var $sliderContainer = $('.input-slider-container'),
	// 		$slider = $('.input-slider'),
	// 		$sliderId = $slider.attr('id'),
	// 		$sliderMinValue = $slider.data('range-value-min');
	// 		$sliderMaxValue = $slider.data('range-value-max');;


	// // Methods
	//
	// function init($this) {
	// 	$this.on('focus blur', function(e) {
  //       $this.parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
  //   }).trigger('blur');
	// }
	//
	//
	// // Events
	//
	// if ($input.length) {
	// 	init($input);
	// }



	if ($(".input-slider-container")[0]) {
			$('.input-slider-container').each(function() {

					var slider = $(this).find('.input-slider');
					var sliderId = slider.attr('id');
					var minValue = slider.data('range-value-min');
					var maxValue = slider.data('range-value-max');

					var sliderValue = $(this).find('.range-slider-value');
					var sliderValueId = sliderValue.attr('id');
					var startValue = sliderValue.data('range-value-low');

					var c = document.getElementById(sliderId),
							d = document.getElementById(sliderValueId);

					noUiSlider.create(c, {
							start: [parseInt(startValue)],
							connect: [true, false],
							//step: 1000,
							range: {
									'min': [parseInt(minValue)],
									'max': [parseInt(maxValue)]
							}
					});

					c.noUiSlider.on('update', function(a, b) {
							d.textContent = a[b];
					});
			})
	}

	if ($("#input-slider-range")[0]) {
			var c = document.getElementById("input-slider-range"),
					d = document.getElementById("input-slider-range-value-low"),
					e = document.getElementById("input-slider-range-value-high"),
					f = [d, e];

			noUiSlider.create(c, {
					start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
					connect: !0,
					range: {
							min: parseInt(c.getAttribute('data-range-value-min')),
							max: parseInt(c.getAttribute('data-range-value-max'))
					}
			}), c.noUiSlider.on("update", function(a, b) {
					f[b].textContent = a[b]
			})
	}

})();

//
// Popover
//

'use strict';

var Popover = (function() {

	// Variables

	var $popover = $('[data-toggle="popover"]'),
		$popoverClass = '';


	// Methods

	function init($this) {
		if ($this.data('color')) {
			$popoverClass = 'popover-' + $this.data('color');
		}

		var options = {
			trigger: 'focus',
			template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		};

		$this.popover(options);
	}


	// Events

	if ($popover.length) {
		$popover.each(function() {
			init($(this));
		});
	}

})();

//
// Scroll to (anchor links)
//

'use strict';

var ScrollTo = (function() {

	//
	// Variables
	//

	var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a');


	//
	// Methods
	//

	function scrollTo($this) {
		var $el = $this.attr('href');
        var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
		var options = {
			scrollTop: $($el).offset().top - offset
		};

        // Animate scroll to the selected section
        $('html, body').stop(true, true).animate(options, 600);

        event.preventDefault();
	}


	//
	// Events
	//

	if ($scrollTo.length) {
		$scrollTo.on('click', function(event) {
			scrollTo($(this));
		});
	}

})();

//
// Tooltip
//

'use strict';

var Tooltip = (function() {

	// Variables

	var $tooltip = $('[data-toggle="tooltip"]');


	// Methods

	function init() {
		$tooltip.tooltip();
	}


	// Events

	if ($tooltip.length) {
		init();
	}

})();

//
// Charts
//

'use strict';

var Charts = (function() {

	// Variable

	var $toggle = $('[data-toggle="chart"]');
	var mode = 'light';//(themeMode) ? themeMode : 'light';
	var fonts = {
		base: 'Open Sans'
	}

	// Colors
	var colors = {
		gray: {
			100: '#f6f9fc',
			200: '#e9ecef',
			300: '#dee2e6',
			400: '#ced4da',
			500: '#adb5bd',
			600: '#8898aa',
			700: '#525f7f',
			800: '#32325d',
			900: '#212529'
		},
		theme: {
			'default': '#172b4d',
			'primary': '#5e72e4',
			'secondary': '#f4f5f7',
			'info': '#11cdef',
			'success': '#2dce89',
			'danger': '#f5365c',
			'warning': '#fb6340'
		},
		black: '#12263F',
		white: '#FFFFFF',
		transparent: 'transparent',
	};


	// Methods

	// Chart.js global options
	function chartOptions() {

		// Options
		var options = {
			defaults: {
				global: {
					responsive: true,
					maintainAspectRatio: false,
					defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontFamily: fonts.base,
					defaultFontSize: 13,
					layout: {
						padding: 0
					},
					legend: {
						display: false,
						position: 'bottom',
						labels: {
							usePointStyle: true,
							padding: 16
						}
					},
					elements: {
						point: {
							radius: 0,
							backgroundColor: colors.theme['primary']
						},
						line: {
							tension: .4,
							borderWidth: 4,
							borderColor: colors.theme['primary'],
							backgroundColor: colors.transparent,
							borderCapStyle: 'rounded'
						},
						rectangle: {
							backgroundColor: colors.theme['warning']
						},
						arc: {
							backgroundColor: colors.theme['primary'],
							borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
							borderWidth: 4
						}
					},
					tooltips: {
						enabled: false,
						mode: 'index',
						intersect: false,
						custom: function(model) {

							// Get tooltip
							var $tooltip = $('#chart-tooltip');

							// Create tooltip on first render
							if (!$tooltip.length) {
								$tooltip = $('<div id="chart-tooltip" class="popover bs-popover-top" role="tooltip"></div>');

								// Append to body
								$('body').append($tooltip);
							}

							// Hide if no tooltip
							if (model.opacity === 0) {
								$tooltip.css('display', 'none');
								return;
							}

							function getBody(bodyItem) {
								return bodyItem.lines;
							}

							// Fill with content
							if (model.body) {
								var titleLines = model.title || [];
								var bodyLines = model.body.map(getBody);
								var html = '';

								// Add arrow
								html += '<div class="arrow"></div>';

								// Add header
								titleLines.forEach(function(title) {
									html += '<h3 class="popover-header text-center">' + title + '</h3>';
								});

								// Add body
								bodyLines.forEach(function(body, i) {
									var colors = model.labelColors[i];
									var styles = 'background-color: ' + colors.backgroundColor;
									var indicator = '<span class="badge badge-dot"><i class="bg-primary"></i></span>';
									var align = (bodyLines.length > 1) ? 'justify-content-left' : 'justify-content-center';
									html += '<div class="popover-body d-flex align-items-center ' + align + '">' + indicator + body + '</div>';
								});

								$tooltip.html(html);
							}

							// Get tooltip position
							var $canvas = $(this._chart.canvas);

							var canvasWidth = $canvas.outerWidth();
							var canvasHeight = $canvas.outerHeight();

							var canvasTop = $canvas.offset().top;
							var canvasLeft = $canvas.offset().left;

							var tooltipWidth = $tooltip.outerWidth();
							var tooltipHeight = $tooltip.outerHeight();

							var top = canvasTop + model.caretY - tooltipHeight - 16;
							var left = canvasLeft + model.caretX - tooltipWidth / 2;

							// Display tooltip
							$tooltip.css({
								'top': top + 'px',
								'left': left + 'px',
								'display': 'block',
								'z-index': '100'
							});

						},
						callbacks: {
							label: function(item, data) {
								var label = data.datasets[item.datasetIndex].label || '';
								var yLabel = item.yLabel;
								var content = '';

								if (data.datasets.length > 1) {
									content += '<span class="badge badge-primary mr-auto">' + label + '</span>';
								}

								content += '<span class="popover-body-value">' + yLabel + '</span>' ;
								return content;
							}
						}
					}
				},
				doughnut: {
					cutoutPercentage: 83,
					tooltips: {
						callbacks: {
							title: function(item, data) {
								var title = data.labels[item[0].index];
								return title;
							},
							label: function(item, data) {
								var value = data.datasets[0].data[item.index];
								var content = '';

								content += '<span class="popover-body-value">' + value + '</span>';
								return content;
							}
						}
					},
					legendCallback: function(chart) {
						var data = chart.data;
						var content = '';

						data.labels.forEach(function(label, index) {
							var bgColor = data.datasets[0].backgroundColor[index];

							content += '<span class="chart-legend-item">';
							content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
							content += label;
							content += '</span>';
						});

						return content;
					}
				}
			}
		}

		// yAxes
		Chart.scaleService.updateScaleDefaults('linear', {
			gridLines: {
				borderDash: [2],
				borderDashOffset: [2],
				color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
				drawBorder: false,
				drawTicks: false,
				lineWidth: 0,
				zeroLineWidth: 0,
				zeroLineColor: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
				zeroLineBorderDash: [2],
				zeroLineBorderDashOffset: [2]
			},
			ticks: {
				beginAtZero: true,
				padding: 10,
				callback: function(value) {
					if (!(value % 10)) {
						return value
					}
				}
			}
		});

		// xAxes
		Chart.scaleService.updateScaleDefaults('category', {
			gridLines: {
				drawBorder: false,
				drawOnChartArea: false,
				drawTicks: false
			},
			ticks: {
				padding: 20
			},
			maxBarThickness: 10
		});

		return options;

	}

	// Parse global options
	function parseOptions(parent, options) {
		for (var item in options) {
			if (typeof options[item] !== 'object') {
				parent[item] = options[item];
			} else {
				parseOptions(parent[item], options[item]);
			}
		}
	}

	// Push options
	function pushOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].push(data);
				});
			} else {
				pushOptions(parent[item], options[item]);
			}
		}
	}

	// Pop options
	function popOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].pop();
				});
			} else {
				popOptions(parent[item], options[item]);
			}
		}
	}

	// Toggle options
	function toggleOptions(elem) {
		var options = elem.data('add');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		if (elem.is(':checked')) {

			// Add options
			pushOptions($chart, options);

			// Update chart
			$chart.update();
		} else {

			// Remove options
			popOptions($chart, options);

			// Update chart
			$chart.update();
		}
	}

	// Update options
	function updateOptions(elem) {
		var options = elem.data('update');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		// Parse options
		parseOptions($chart, options);

		// Toggle ticks
		toggleTicks(elem, $chart);

		// Update chart
		$chart.update();
	}

	// Toggle ticks
	function toggleTicks(elem, $chart) {

		if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
			var prefix = elem.data('prefix') ? elem.data('prefix') : '';
			var suffix = elem.data('suffix') ? elem.data('suffix') : '';

			// Update ticks
			$chart.options.scales.yAxes[0].ticks.callback = function(value) {
				if (!(value % 10)) {
					return prefix + value + suffix;
				}
			}

			// Update tooltips
			$chart.options.tooltips.callbacks.label = function(item, data) {
				var label = data.datasets[item.datasetIndex].label || '';
				var yLabel = item.yLabel;
				var content = '';

				if (data.datasets.length > 1) {
					content += '<span class="popover-body-label mr-auto">' + label + '</span>';
				}

				content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
				return content;
			}

		}
	}


	// Events

	// Parse global options
	if (window.Chart) {
		parseOptions(Chart, chartOptions());
	}

	// Toggle options
	$toggle.on({
		'change': function() {
			var $this = $(this);

			if ($this.is('[data-add]')) {
				toggleOptions($this);
			}
		},
		'click': function() {
			var $this = $(this);

			if ($this.is('[data-update]')) {
				updateOptions($this);
			}
		}
	});


	// Return

	return {
		colors: colors,
		fonts: fonts,
		mode: mode
	};

})();

//
// Orders chart
//

var OrdersChart = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-orders');
	var $ordersSelect = $('[name="ordersSelect"]');


	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'bar',
			options: {
				scales: {
					yAxes: [{
						ticks: {
							callback: function(value) {
								if (!(value % 10)) {
									//return '$' + value + 'k'
									return value
								}
							}
						}
					}]
				},
				tooltips: {
					callbacks: {
						label: function(item, data) {
							var label = data.datasets[item.datasetIndex].label || '';
							var yLabel = item.yLabel;
							var content = '';

							if (data.datasets.length > 1) {
								content += '<span class="popover-body-label mr-auto">' + label + '</span>';
							}

							content += '<span class="popover-body-value">' + yLabel + '</span>';
							
							return content;
						}
					}
				}
			},
			data: {
				labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: 'Sales',
					data: [25, 20, 30, 22, 17, 29]
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', ordersChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();

//
// Charts
//

'use strict';

//
// Sales chart
//

var SalesChart = (function() {

	// Variables

	var $chart = $('#chart-sales');


	// Methods

	function init($chart) {

		var salesChart = new Chart($chart, {
			type: 'line',
			options: {
				scales: {
					yAxes: [{
						gridLines: {
							color: Charts.colors.gray[900],
							zeroLineColor: Charts.colors.gray[900]
						},
						ticks: {
							callback: function(value) {
								if (!(value % 10)) {
									return '$' + value + 'k';
								}
							}
						}
					}]
				},
				tooltips: {
					callbacks: {
						label: function(item, data) {
							var label = data.datasets[item.datasetIndex].label || '';
							var yLabel = item.yLabel;
							var content = '';

							if (data.datasets.length > 1) {
								content += '<span class="popover-body-label mr-auto">' + label + '</span>';
							}

							content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
							return content;
						}
					}
				}
			},
			data: {
				labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: 'Performance',
					data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
				}]
			}
		});

		// Save to jQuery object

		$chart.data('chart', salesChart);

	};


	// Events

	if ($chart.length) {
		init($chart);
	}

})();

/* --------------------------------- GPON app ----------------------------------------------------------*/

// import './bootstrap';

// const { forEach } = require("lodash");

// function agregarFila(){

//     var cant_puertos = document.getElementById("cant_puertos").value;


//   document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input type="text" id="puerto_'+rowCount +'" name="puerto_'+rowCount +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><input type="text" id="Estado_'+rowCount +'" name="Estado_'+rowCount +'" required="required" placeholder="Estado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <select for="form_estado_id" id="estado_id_'+rowCount +'" name="estado_id_'+rowCount +'" required="required" class="form-control"> @foreach($estados->getEstados() as $index => $estado)<option value="{{$index}}"> {{$estado}} </option> @endforeach</select></td>';
// }
function eliminarFila(){
	var table = document.getElementById("tablaprueba");
	var rowCount = table.rows.length;
	//console.log(rowCount);
  
	if(rowCount <= 0)
	  alert('No se puede eliminar el encabezado');
	else
	  table.deleteRow(rowCount -1);
	  // table.in
  }
  
	  function AddToSecondList() {
		  var fl = document.getElementById('firstlist');
		  var sl = document.getElementById('secondlist');
		  for (i = 0; i < fl.options.length; i++) {
			  if (fl.options[i].selected) {
				  sl.add(fl.options[i], null);
			  }
		  }
		  return true;
	  }
  // *********************************************************cambio realizado por jorge omentado colocare otra funcion**************************************************************
  // function admiuplink() 
  // {
	 
  //     if (validar("puerto_uplin") == false){$("#puerto_uplin").focus();	return false;};
  //     $("#formulario_registro").hide();
  //     var cant_puertos = document.getElementById("puerto_uplin").value;
  //     alert(cant_puertos) ;
  //     $.ajax({
  //         url:'10.53.248.146/tipos',
  //         type:'GET'
  //     }).done(function(data){
  //         alert("hola");
  //         for( i = 0;i < cant_puertos;i++) 
  //         {
  //             document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <input type="checkbox" checked id="estado_'+i +'" name="estado_'+i +'" required="required"  class="form-control tip" /></td><td> <select for="form_estado_id" id="sfp" name="sfp" required="required" class="form-control"><option value=""> Seleccione SFP</option>'; 
  
  //             var spf=data;
  //             var id=sfp[i]['id'];
  //             var nameSfp=sfp[i]['nameSfp'];
  //             document.getElementById("sfp").innerHTML='<option >'+ nameSfp +'</option>';
  
  //             document.getElementById("tablaprueba").innerHTML +='</select></td></tr>';
  //         }
  //     });
	  
  //     $("#formulario_registro_2").show();
  // 	// $('.tip').tooltipster('hide');
  // }
  
  
  function admiuplink() {
	  var i ;
	  // if (validar("puerto_uplin") == false){$("#puerto_uplin").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( i = 0;i < cant_puertos;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select name="estado_'+i +'" id="estado_'+i +'" class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i+'" name="sfpt_'+i+'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
	  }
			  $.get('sfptup', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  var cant_puertos = document.getElementById("puerto_uplin").value;
  for( i = 0;i < cant_puertos;i++) {
				  // alert(i) ;
			  $("#sfpt_"+i).append("</option><option value='" + index + "'> " + value + "</option>");
  }
		  })
	  });
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  
  
  function atraspass() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  
  function admincables() {
	  //var i ;
	   if (validar("cantidad") == false){$("#cantidad").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cantidad = document.getElementById("cantidad").value;
	 // alert (cantidad);
	  //var sfp = document.getElementByid("sfp");
	  for( i = 0;i<cantidad;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="Cód '+i +'" readonly required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="ruta '+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="50"/></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
	  }
			  /*$.get('sfptup', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  $("select").append("</option><option value='" + index + "'> " + value + "</option>");
  
		  })
	  });*/
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  
  
  function atraspass() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  
	  function DeleteSecondListItem() {
		  var fl = document.getElementById('firstlist');
		  var sl = document.getElementById('secondlist');
		  for (i = 0; i < sl.options.length; i++) {
			  if (sl.options[i].selected) {
				  fl.add(sl.options[i], null);
				  // O...
				  // sl.remove(sl.options[i]);
			  }
		  }
		  return true;
	  }
  function def() {
	  
		  if ($('#centralizado').prop('checked')) {
				  // $("#formulario_registro").hide();
				  $('#descentralizado').removeAttr('checked');
				  $("#formulario_registro_3").hide();
	  $("#formulario_registro_2").show();
	  $("#formulario_registro_3").show();
		  }else{
				  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  }
  }
  //  $(document).ready(function() {
  //         if ($('#centralizado').prop('checked')) {
  //             $('#descentralizado').removeAttr('checked');
  //         }
  //     });
  function defi() {
		  if ($('#descentralizado').prop('checked')) {
				  // $("#formulario_registro").hide();
				  $('#centralizado').removeAttr('checked');
				  $("#formulario_registro_2").hide();
	  $("#formulario_registro_3").show();
		  }else{
				  $("#formulario_registro").show();
	  $("#formulario_registro_3").hide();
		  }
  }
  
  function catastro() {
	   var i ;
	  if (validar("cant_mbx_terminal") == false){$("#cant_mbx_terminal").focus();	return false;};
	  var cant_puertos = document.getElementById("cant_mbx_terminal").value;
	  for( i = 0;i < cant_puertos;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="casa_'+i +'" name="casa_'+i +'" required="required" placeholder="casa" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /></td><td><input type="text" id="Nombre_'+i +'" name="Nombre_'+i +'" required="required" placeholder="Nombre" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /></td></tr>';
	  }
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function defPorts() {
	  var i ;
	  if (validar("cant_puertos") == false){$("#cant_puertos").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cant_puertos = document.getElementById("cant_puertos").value;
	  for( i = 0;i < cant_puertos;i++) {
		  // document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><input type="text" id="Estado_'+i +'" name="Estado_'+i +'" required="required" placeholder="Estado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <select for="form_estado_id" id="sfpt_'+i +'" name="sfpt_'+i +'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
		   document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" required="required" value="'+i +'" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select name="estado_'+i +'" id="estado_'+i +'" class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i+'" name="sfpt_'+i+'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'i
	  }
			  $.get('sfpgp', {
	  }, function(parroquia) {
		  
  
		  $.each(parroquia, function(index, value) {
			  var cant_puertos = document.getElementById("cant_puertos").value;
  for( i = 0;i < cant_puertos;i++) {
				  // alert(i) ;
			  $("#sfpt_"+i).append("</option><option value='" + index + "'> " + value + "</option>");
  }
		  })
	  });
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  // function defPorts() {
  //     // var i ;
  //     if (validar("cant_puertos") == false){$("#cant_puertos").focus();	return false;};
  //     $("#formulario_registro").hide();
  //     var cant_puertos = document.getElementById("cant_puertos").value;
  //     // var cant_puertos = (cant_puerto)+1;
  //     for( i = 0 ;i < cant_puertos;i++) {
  //         document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" required="required" placeholder="'+i+'" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i +'" name="sfpt_'+i +'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
  //     }
  //     // <input type="text" id="Estado_'+i +'" name="Estado_'+i +'" required="required" placeholder="Desactivado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/>
  //     //         $.get('sfpt', {
  //     // }, function(parroquia) {
  //     //     $.each(parroquia, function(index, value) {
  //     //         $("select").append("</option><option value='" + index + "'> " + value + "</option>");
  
  //     //     })
  //     // });
  //     $("#formulario_registro_2").show();
  // 	// $('.tip').tooltipster('hide');
  // }
  
  function paso2() {
	  $("#formulario_registro").hide();
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  function cargapaso2() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso2() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("cant_puertos").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  function paso3() {
	  $("#formulario_registro_2").hide();
	  $("#formulario_registro_3").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso3() {
	  $("#formulario_registro_3").hide();
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  function paso4() {
	  $("#formulario_registro_3").hide();
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso4() {
	  $("#formulario_registro_4").hide();
	  $("#formulario_registro_3").show();
	  // $('.tip').tooltipster('hide');
  }
   $(document).ready(function() {
		  $('#spf_select').on('change', function() {
			  var estado_id = '1';
			  if ($.trim(estado_id) != '') {
				  $.get('sfps', {
  
  
					  estado_id: estado_id
				  }, function(ciudad) {
					  $.each(ciudad, function(index, value) {
						  $('#spf_select').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
  function paso5() {
	  if (validar("prefijo_ced") == false){$("#prefijo_ced").focus();	return false;};
	  if (validar("form_cedula") == false){$("#form_cedula").focus();	return false;};
	  if (validar("form_nombres") == false){$("#form_nombres").focus();	return false;};
	  if (validar("form_apellidos") == false){$("#form_apellidos").focus();	return false;};
	  if (validar("prefijo_tlf_contacto") == false){$("#prefijo_tlf_contacto").focus();	return false;};
	  if (validar("form_tlf_contacto") == false){$("#form_tlf_contacto").focus();	return false;};
	  if (validar("prefijo_tlf_movil") == false){$("#prefijo_tlf_movil").focus();	return false;};
	  if (validar("form_tlf_movil") == false){$("#form_tlf_movil").focus();	return false;};
	  if (validar("form_correo_electronico") == false){$("#form_correo_electronico").focus();	return false;};
	  if (validar("form_usuario") == false){$("#form_usuario").focus();	return false;}; //revisar
	  if (validar("form_contrasena") == false){$("#form_contrasena").focus();	return false;};
	  if (validar("form_confirm_contrasena") == false){$("#form_confirm_contrasena").focus();	return false;};
  
	  $("#formulario_registro_4").hide();
	  $("#formulario_registro_5").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso5() {
	  $("#formulario_registro_5").hide();
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function limpiarForm(){
	  document.getElementById("name_inmueble_client").value ="";
	  document.getElementById("Apto_client").value = "";
	  document.getElementById("calle_client").value ="";
	  document.getElementById("tipo_vivi_client").value = "";
	  document.getElementById("numero_client").value ="";
	  document.getElementById("nombre_vivi_client").value = "";
	  document.getElementById("ciudad_client").value ="";
	  document.getElementById("parroquia_client").value = "";
	  document.getElementById("zona_p_client").value ="";
	  document.getElementById("estado_client").value = "";
	  document.getElementById("municipo_client").value ="";
	  document.getElementById("Urbanizacion_client").value = "";
	  document.getElementById("inmueble_client").value ="";
	  document.getElementById("ubicacion_client").value = "";
	  document.getElementById("correo_electronico").value ="";
	  document.getElementById("usuario").value = "";
	  document.getElementById("form_contrasena").value ="";
	  document.getElementById("form_confirm_contrasena").value = "";
	  document.getElementById("prefijo_tlf_movil").value ="-";
	  document.getElementById("tlf_movil").value = "";
	   document.getElementById("prefijo_tlf_contacto").value ="-";
	  document.getElementById("tlf_contacto").value = "";
	  document.getElementById("cedula").value ="";
	  document.getElementById("nombres").value = "";
	  document.getElementById("apellidos").value ="";
	  document.getElementById("prefijo_ced").value ="-";
  
  }
  function limpiarequi(){
	  document.getElementById("num_Serial").value ="";
	  document.getElementById("model_Product").value = "";
  }
  
  function limpiarConsul(){
	  // $('#estado_id').empty();
	  $('#ciudad_id').empty();
	  $('#municipio_id').empty();
	  $('#parroquia_id').empty();
	  $('#urbanizacion_id').empty();
  
  }
   $(document).ready(function() {
		  $('#central_id').on('change', function() {
			  $('#olt_id').empty();
					  $('#tarjeta_id').empty();
			  //         $('#puerto_id').empty();
					  // $('#odf_id').empty();
			  var central_id = $(this).val();
			  if ($.trim(central_id) != '') {
				  $.get('oltodos', {
					  central_id: central_id
				  }, function(central) {
					  $('#olt_id').empty();
					  $('#tarjeta_id').empty();
					  // $('#parroquia_id').empty();
					  // $('#odf_id').empty();
					  $('#olt_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#olt_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  $(document).ready(function() {
		  $('#olt_id').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#id_targetPort').empty();
			  var olt_id = $(this).val();
			  if ($.trim(olt_id) != '') {
				  $.get('tartodos', {
					  olt_id: olt_id
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#id_targetPort').empty();
					  $('#id_targetPort').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#id_targetPort').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
		  $(document).ready(function() {
		  $('#id_targetPort').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#puerto_id').empty();
			  var id_targetPort = $(this).val();
			  if ($.trim(id_targetPort) != '') {
				  $.get('porttodos', {
					  id_targetPort: id_targetPort
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#puerto_id').empty();
					  $('#puerto_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#puerto_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	   $(document).ready(function() {
		  $('#central_id').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#odf_id').empty();
			  var central_id = $(this).val();
			  if ($.trim(central_id) != '') {
				  $.get('odftodos', {
					  central_id: central_id
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#odf_id').empty();
					  $('#odf_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#odf_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  
   $(document).ready(function() {
		  $('#estado_id').on('change', function() {
			  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var estado_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('ciudades', {
					  estado_id: estado_id
				  }, function(ciudad) {
					  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#ciudad_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(ciudad, function(index, value) {
						  $('#ciudad_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
	  $(document).ready(function() {
		  $('#ciudad_id').on('change', function() {
			  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var ciudad_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('municipios', {
					  ciudad_id: ciudad_id
				  }, function(municipio) {
					  $('#municipio_id').empty();
					   $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#municipio_id').append("<option value=''> Seleccione un municipio</option>");
  
					  $.each(municipio, function(index, value) {
						  $('#municipio_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#municipio_id').on('change', function() {
			  $('#urbanizacion_id').empty();
			  var municipio_id = $(this).val();
			  if ($.trim(municipio_id) != '') {
				  $.get('parroquias', {
					  municipio_id: municipio_id
				  }, function(parroquia) {
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#parroquia_id').append("<option value=''> Seleccione una parroquia</option>");
  
					  $.each(parroquia, function(index, value) {
						  $('#parroquia_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  $(document).ready(function() {
		  $('#parroquia_id').on('change', function() {
			  var parroquia_id = $(this).val();
			  if ($.trim(parroquia_id) != '') {
				  $.get('urbanizaciones', {
					  parroquia_id: parroquia_id
				  }, function(urbanizacion) {
					  $('#urbanizacion_id').empty();
					  $('#urbanizacion_id').append("<option value=''> Seleccione urbanización/Sector</option>");
  
					  $.each(urbanizacion, function(index, value) {
						  $('#urbanizacion_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#urbanizacion_id').on('change', function() {
			  var urbanizacion_id = $(this).val();
			  if ($.trim(urbanizacion_id) != '') {
				  $('#btn-consul_p').removeAttr('disabled');
			  }
		  });
	  });
  
  
	  $(document).ready(function(){
	  var conteo = 0; // definimos una variable para verificar el estado del click
	 $("#show_pass").click(function(){
	  if(conteo == 0) { //Si la variable es igual a 0
		  conteo = 1; //La cambiamos a 1
		  $('#form_contrasena').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
		  $("#form_contrasena").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escrita)
		  $('#form_confirm_contrasena').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
		  $("#form_confirm_contrasena").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escrita)
		  $("#eye").css("color" , "red");
	  }
	  else{ //En caso contrario
		  conteo = 0; //La cambiamos a 0
		  $('#form_contrasena').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
		  $("#form_contrasena").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
		  $('#form_confirm_contrasena').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
		  $("#form_confirm_contrasena").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
		  $("#eye").css("color" , "#666");
	  }
  
		  $(this).attr('src', '../img/empresas.png');//cambia de imagen en el over
	 });
  });
  
  
  var tabla;
  
  // function listar()
  $(document).ready(function () {
	  tabla=$('#tbllistado').dataTable(
	  {
		  "aProcessing": true,//Activamos el procesamiento del datatables
		  "aServerSide": true,//Paginación y filtrado realizados por el servidor
		  dom: 'Bfrtip',//Definimos los elementos del control de tabla
		  buttons: [
					  'copyHtml5',
					  'excelHtml5',
					  'csvHtml5',
					  'pdf'
				  ],
		  // // "ajax":
		  // // 		{
		  // // 			url: 'centrals',
		  // // 			type : "get",
		  // // 			dataType : "json",
		  // // 			error: function(e){
		  // // 				console.log(e.responseText);
		  // // 			}
		  // // 		},
  
		  // "ajax":
		  //         "centrals",
		  //         "colums": [{
		  //             data: 'codigo_central'},
		  //         {data:'name_central'}
		  //     ],
		  "bDestroy": true,
		  "iDisplayLength": 3,//Paginación
		  "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
		  });
	  // }).DataTable();
  });
  
  var tablaorden;
  
  // function listar()
  // $(document).ready(function () {
	  // tablaorden=$('#tbllistadoorden').dataTable(
	  // {
	  // 	"aProcessing": true,//Activamos el procesamiento del datatables
	  //     "aServerSide": true,//Paginación y filtrado realizados por el servidor
	  //     dom: 'Bfrtip',//Definimos los elementos del control de tabla
	  //     buttons: [
	  // 	            // 'copyHtml5',
	  // 	            // 'excelHtml5',
	  // 	            // 'csvHtml5',
	  // 	            // 'pdf'
	  // 	        ],
	  // 	"ajax":
	  // 			{
	  // 				url: '/GPON/public/ordenes/all',
	  // 				type : "get",
	  // 				dataType : "json",
	  // 				error: function(e){
	  // 					console.log(e.responseText);
	  // 				}
	  //     		},
  
	  // 	"ajax":
	  //             "centrals",
	  //             "colums": [{
	  //                 data: 'codigo_central'},
	  //             {data:'name_central'}
	  //         ],
	  // 	"bDestroy": true,
	  // 	"iDisplayLength": 3,//Paginación
	  //     "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	  //     });
	  // }).DataTable();
  // data = $(this).serialize();
  //     $.get('/GPON/public/ordenes/all',data,function (search) {
  //         $('#tbody').html('');
  //         $.each(search,function (key,val) {
  //            $.get('#tbody').append('<tr><td>'+val.orden+'</td>'+
  //                 '<td>'+val.orden+'</td>'+
  //                 '<td>'+val.cuenta_contrato+'/<td>'+
  //                 '<td>'+val.rif_O_Cedula+'</td>'+
  //                 '<td>'+val.serial+'</td>'+
  //                 '<td>'+val.creado+'</td>'+
  //                 '<td>'+val.asignado+'</td>'+
  //                 '<td>'+val.cola+'</td>'+
  //                 '<td>'+val.estado+'</td>'+
  //                 '<td>'+val.tipo+'</td>');
  
  //         });
  
  
  //     });
  // });
  
  // function buscarorden() {
  //     // $(document).ready(function () {
  //     //     $.ajax({
  //     //         url: '/ordenes/all',
  //     //         method: 'POST',
  //     //         data: $("#formulario_registro_orden").serialize()
  //     //     }).done(function (res) {
  //     //         alert(res);
  //     //     })
  
  //     // })çalert('hola');
  
  //     var datos = $("#formulario_registro_orden").serialize();
  //     $.ajax({
  //         data : datos,
  //         url: '/ordenes/all',
  //         method : 'POST',
  
  
  //     }).done(function (res) {
  //         	tablaorden=$('#tbllistadoorden').dataTable(
  // 	{
  // 		"aProcessing": true,//Activamos el procesamiento del datatables
  // 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
  // 	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
  // 	    buttons: [
  // 		            // 'copyHtml5',
  // 		            // 'excelHtml5',
  // 		            // 'csvHtml5',
  // 		            // 'pdf'
  // 		        ],
  // 		// // "ajax":
  // 		// // 		{
  // 		// // 			url: 'centrals',
  // 		// // 			type : "get",
  // 		// // 			dataType : "json",
  // 		// // 			error: function(e){
  // 		// // 				console.log(e.responseText);
  // 		// // 			}
  //         // // 		},
  
  // 		"ajax":
  //                 "centrals",
  //                 "colums": [{
  //                     data: 'orden'},
  //                 {data:'cuenta_contrato'}
  //             ],
  // 		"bDestroy": true,
  // 		"iDisplayLength": 3,//Paginación
  //         "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  //         });
  // 	// }).DataTable();
  
  //     })
  
  // }
  
  function buscarorden() {
  
  }
  
  // $(document).ready(function () {
  //     $('#listadoregistros').hide();
  //     })
  
	  $('#buscarorden').click(function name(params) {
		  $('#listadoregistros').show();
	  data = $(this).serialize();
		  $.ajax({
			  url: '/GPON/public/ordenes/all',
			  method: 'GET',
			  // data: $("#formulario_registro_orden").serialize()
			  data : data,
		  }).done(function (res) {
			  // alert(res);
			  var arrreglo = JSON.parse(res);
  
			  for (let x = 0; x < arrreglo.length; x++) {
				  var element = '<tr><td>'+arrreglo[x].orden+'</td>';
  
				  element += '<td>'+arrreglo[x].cuenta_contrato+'/<td>';
				  element += '<td>'+arrreglo[x].rif_O_Cedula+'</td>';
				  element += '<td>'+arrreglo[x].serial+'</td>';
				  element += '<td>'+arrreglo[x].created_at+'</td>';
				  element += '<td>'+arrreglo[x].creado+'</td>';
				  element += '<td>'+arrreglo[x].asignado+'</td>';
				  element += '<td>'+arrreglo[x].created_at+'</td>';
				  element += '<td>'+arrreglo[x].cola+'</td>';
				  element += '<td>'+arrreglo[x].estado+'</td>';
				  element += '<td>'+arrreglo[x].tipo+'</td>';
  
				  $("#tbody").append(element);
  
  
			  }
		  })
	  })
  
  
  $(document).ready(function() {
		  $('#estado_id').on('change', function() {
			  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var estado_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('ciudadesedit', {
					  estado_id: estado_id
				  }, function(ciudad) {
					  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#ciudad_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(ciudad, function(index, value) {
						  $('#ciudad_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
	  $(document).ready(function() {
		  $('#ciudad_id').on('change', function() {
			  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var ciudad_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('municipios', {
					  ciudad_id: ciudad_id
				  }, function(municipio) {
					  $('#municipio_id').empty();
					   $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#municipio_id').append("<option value=''> Seleccione un municipio</option>");
  
					  $.each(municipio, function(index, value) {
						  $('#municipio_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#municipio_id').on('change', function() {
			  $('#urbanizacion_id').empty();
			  var municipio_id = $(this).val();
			  if ($.trim(municipio_id) != '') {
				  $.get('parroquias', {
					  municipio_id: municipio_id
				  }, function(parroquia) {
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#parroquia_id').append("<option value=''> Seleccione una parroquia</option>");
  
					  $.each(parroquia, function(index, value) {
						  $('#parroquia_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  function listar()
  {
	  var cant_puertos = document.getElementById("cant_puertos").value;
			  $.get('sfpt', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  // var table = document.getElementById("tablaprueba");
			  // var rowCount = table.rows;
			  // var cant_puertos = document.getElementById("cant_puertos").value;
  //   for( var i = 0;i = cant_puertos;i++) {
  
  
			  $("#sfpt_").append("</option><option value='" + index + "'> " + value + "</option>");
  // }
		  })
	  });
  
  }
  