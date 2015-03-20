'use strict';

var dest = './public/assets';
var src = './resources/assets';

module.exports = {
    styles: {
        src: src + '/styles/**/*.{sass,scss}',
        dest: dest + '/styles',
        settings: {
            sourceComments: 'normal',
            errLogToConsole: true,
            imagePath: '/images'
        }
    },

    production: {
        cssSrc: dest + '/*.css',
        jsSrc: dest + '/*.js',
        dest: dest
    }
};
