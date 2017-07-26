(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["jquery", "moment", "datatables"], factory);
    } else {
        factory(jQuery, moment);
    }
}(function ($, moment) {
 
$.fn.dataTable.moment = function ( format, locale ) {
    var types = $.fn.dataTable.ext.type;
 
    // Add type detection
    types.detect.unshift( function ( d ) {
        // Strip HTML tags if possible
        if ( d && d.replace ) {
            d = d.replace(/<.*?>/g, '');
        }
 
        // Null and empty values are acceptable
        if ( d === '' || d === null ) {
            return 'moment-'+format;
        }
 
        return moment( d, format, locale, true ).isValid() ?
            'moment-'+format :
            null;
    } );
 
    // Add sorting method - use an integer for the sorting
    types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
        if ( d && d.replace ) {
            d = d.replace(/<.*?>/g, '');
        }
        return d === '' || d === null ?
            -Infinity :
            parseInt( moment( d, format, locale, true ).format( 'x' ), 10 );
    };
};
 
}));