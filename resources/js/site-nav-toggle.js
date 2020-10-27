/**
 * Site Navigation Toggle
 *
 * A flexible and accessible toggle for site navigation
 */

var siteNavToggle = (function() {

    var props   = {}; // Store properties
    var methods = {}; // Store methods (functions)
    var elems   = {}; // Store elements
    var events  = {}; // Store events
    var helpers = {}; // Store private helper methods

    /* ENGINE
    -------------------------------------*/

    // Initialize
    methods.init = function( customOptions ) {

        // Setup toggle and target
        methods.setup( customOptions );

        // We only need to control if we have a toggle and a target
        if ( elems.toggle && elems.target ) {

            // Make sure toggle and target are in the right state
            methods.reset();

            // Manage control of toggle and target
            methods.control();
        }
    };

    // Setup
    methods.setup = function( customOptions ) {

		// Set default options
		props.options = {
            rootSelector:   'body',
            toggleSelector: '.site-nav-toggle',
            targetSelector: '.site-nav',
            activeRootClass: 'has-expanded-site-nav'
		};

        // Merge options
        props.options = helpers.extend( true, props.options, customOptions );

        // Get root
        elems.root = document.querySelector( props.options.rootSelector );

        // Get toggle
        elems.toggle = document.querySelector( props.options.toggleSelector );

        // Get navigation based on toggle-target
        elems.target = document.querySelector( props.options.targetSelector );

        if ( elems.target ) {

            // Focusable elements inside the target
            elems.targetFocusable = elems.target.querySelectorAll([
                'a[href]',
                'area[href]',
                'input:not([disabled])',
                'select:not([disabled])',
                'textarea:not([disabled])',
                'button:not([disabled])',
                'iframe',
                'object',
                'embed',
                '[contenteditable]',
                '[tabindex]:not([tabindex^="-"])'
            ]);
        }
    };

    // Control
    methods.control = function() {

        // Manage opening and closing of target
        events.onClickToggle( methods.toggle );

        // // Extra closing methods
        events.onPressEscape( methods.close );
        events.onClickOutsideTarget( methods.close );
    };

    /**
     * Make sure toggle and target are in the right state
     */
    methods.reset = function() {
        elems.toggle.setAttribute('aria-expanded', 'false');
        elems.target.setAttribute('aria-expanded', 'false');
        elems.root.classList.remove(props.options.activeRootClass);

        // Force toggle to be focusable
        // elems.toggle.tabIndex = 0;

        // Prevent target from getting focus
        methods.preventFocusInTarget();
    };

    /* FUNCTIONS
    -------------------------------------*/

    /**
	 * Toggle menu classes and ARIA.
	 */
	methods.toggle = function( toggle ) {

		if (methods.isOpen()) {
			methods.close();
        }
		else {
			methods.open( toggle );
        }
	};

	/**
	 * Open target
	 */
	methods.open = function( toggle ) {

        // Don't open if target is not closed
        if ( ! methods.isClose() ) {
            return;
        }

		elems.toggle.setAttribute('aria-expanded', 'true');
        elems.target.setAttribute('aria-expanded', 'true');
        elems.root.classList.add(props.options.activeRootClass);

		// Get lastFocus element
        elems.lastFocus = toggle;

        // Trap focus in target
        methods.allowFocusInTarget();
        methods.trapFocusInTarget();
	};

	/**
	 * Close target
	 */
	methods.close = function() {

        // Don't close if target is not open
        if ( ! methods.isOpen() ) {
            return;
        }

		elems.toggle.setAttribute('aria-expanded', 'false');
		elems.target.setAttribute('aria-expanded', 'false');
		elems.root.classList.remove(props.options.activeRootClass);

		// Return focus to lastFocussed element
        if (elems.lastFocus) {
            elems.lastFocus.focus();
        }

        // Prevent target from getting focus
        methods.preventFocusInTarget();
	};

	/**
	 * Check if target is open (expanded)
	 */
	methods.isOpen = function() {
        return elems.target.getAttribute('aria-expanded') == 'true';
    };

    /**
     * Check if target is closed (not expanded)
     */
    methods.isClose = function() {
        return ! methods.isOpen();
    };

    // Trap focus in target
    methods.trapFocusInTarget = function() {

        // Get first and last focusable element to define the edges of the tab-scope
        const firstFocusableElem = elems.targetFocusable[0];
        const lastFocusableElem  = elems.targetFocusable[elems.targetFocusable.length - 1];

        // On Tab of the toggle
        elems.toggle.addEventListener('keydown', function (e) {

            if ( methods.isOpen() ) {

                // Redirect Shift+Tab to lastFocusableElem
                if (9 === e.keyCode && e.shiftKey) {
                    e.preventDefault();
                    lastFocusableElem.focus(); // Set focus on first element.
                }

                // Redirect Tab to firstFocusableElem
                if (9 === e.keyCode && !e.shiftKey) {
                    e.preventDefault();
                    firstFocusableElem.focus();
                }
            }
        });

        // On Tab of the first target focusable elem
        firstFocusableElem.addEventListener('keydown', function (e) {

            if ( methods.isOpen() ) {

                // Redirect first Shift+Tab to toggle
                if (9 === e.keyCode && e.shiftKey) {
                    e.preventDefault();
                    elems.toggle.focus(); // Set focus on first element.
                }
            }
        });

        // On Tab of the last target focusable elem
        lastFocusableElem.addEventListener('keydown', function (e) {

            if ( methods.isOpen() ) {

                // Redirect last Tab to toggle
                if (9 === e.keyCode && !e.shiftKey) {
                    e.preventDefault();
                    elems.toggle.focus();
                }
            }
        });
    };

    // Allow focus in target
    methods.allowFocusInTarget = function() {

        // Remove negative tabindexes set by methods.preventFocusInTarget()
        for (var i = 0; i < elems.targetFocusable.length; i++) {
            elems.targetFocusable[i].removeAttribute('tabindex');
        }
    };

    // Prevent focus in target
    methods.preventFocusInTarget = function() {

        // Set tabindex to -1 to prevent tabbing
        for (var i = 0; i < elems.targetFocusable.length; i++) {
            elems.targetFocusable[i].tabIndex = -1;
        }
    };


    /* EVENTS
    -------------------------------------*/

    // On click target toggle
    events.onClickToggle = function(callback) {

        // Exit if callback is not a function
        if (typeof callback !== "function")
            return;

        // Click on toggle
        document.addEventListener( 'click', function(event) {

            // Check if toggle
            if ( elems.toggle.contains( event.target ) ) {
                event.preventDefault();

                callback(event.target);
            }

        }, false );
    };

    // On press Escape Key
    events.onPressEscape = function(callback) {

        // Check if callback is function
        if (typeof callback !== "function")
            return;

        document.addEventListener('keyup', function(event) {

            // 27 = Escape key
            if (27 === event.keyCode) {
                callback();
            }
        }, false);
    }

    // Click outside target
    events.onClickOutsideTarget = function( callback ) {

        // Check if callback is function
        if (typeof callback !== "function")
            return;

        // Listen to click outside target
        document.addEventListener( 'click', function( event ) {

            // Only proceed if click is outside target. Toggle is not outside target
            if ( ! elems.target.contains( event.target ) && ! elems.toggle.contains( event.target ) ) {
            	console.log('onClickOutsideTarget');
                callback();
            }


        }, false);
    };


    /* HELPERS
    -------------------------------------*/

    // Pass in the objects to merge as arguments.
    // For a deep extend, set the first argument to `true`.
    helpers.extend = function () {

        // Variables
        var extended = {};
        var deep = false;
        var i = 0;
        var length = arguments.length;

        // Check if a deep merge
        if ( Object.prototype.toString.call( arguments[0] ) === '[object Boolean]' ) {
            deep = arguments[0];
            i++;
        }

        // Merge the object into the extended object
        var merge = function (obj) {
            for ( var prop in obj ) {
                if ( Object.prototype.hasOwnProperty.call( obj, prop ) ) {
                    // If deep merge and property is an object, merge properties
                    if ( deep && Object.prototype.toString.call(obj[prop]) === '[object Object]' ) {
                        extended[prop] = helpers.extend( true, extended[prop], obj[prop] );
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        // Loop through each object and conduct a merge
        for ( ; i < length; i++ ) {
            var obj = arguments[i];
            merge(obj);
        }

        return extended;
    };

    // Return
    return {
        init: methods.init,
        props: props,
        elems: elems
    };
})();

export default siteNavToggle;
