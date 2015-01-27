var NRD = window.NRD || {};

NRD['./views/TestView'] = (function($){
	
	var Test = function($element) {
		this.init();
		this.winWidth();
	};

	var proto = Test.prototype;

	proto.init = function () {
		console.log('this is init');
	};

	proto.winWidth = function() {
		var width = $(window).width();
		console.log(width);
	};


	return Test;

}(jQuery));