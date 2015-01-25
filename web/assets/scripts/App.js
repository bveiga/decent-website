var NRD = window.NRD || {};

NRD['./App'] = (function(
    $,
    TestView
) {
    'use strict';

    /**
     * Initial application setup. Runs once upon every page load.
     *
     * @class App
     * @constructor
     */
    var App = function() {
        this.init();
    };

    var proto = App.prototype;

    /**
     * Initializes the application and kicks off loading of prerequisites.
     *
     * @method init
     * @private
     */
    proto.init = function() {
        // Create your views here
        this.test = new TestView();

    };

    return App;

}(
    jQuery,
    NRD['./views/TestView']
));