var gulp = require('gulp');
var config = require('../config');
var sass = require('gulp-ruby-sass');
var autoprefixer = require('gulp-autoprefixer');
var csso = require('gulp-csso');
var ignore = require('gulp-ignore');
var plumber = require('gulp-plumber');
var handleErrors = require('../utils/handle-errors');

var source = config.src.assets + '/styles/' + config.name + '.scss';

gulp.task('sass', function () {
    return sass(source, {
            container: config.name,
            loadPath: [config.bower.root]
        })
        .pipe(plumber({errorHandler: handleErrors}))
        .pipe(autoprefixer())
        .pipe(csso())
        .pipe(gulp.dest(config.build.assets + '/styles'));
});
