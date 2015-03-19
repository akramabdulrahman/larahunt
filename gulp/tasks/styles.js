'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var handleErrors = require('../utils/handleErrors');
var config = require('../config').styles;
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('styles', function() {
    return gulp.src(config.src)
        .pipe(sourcemaps.init())
        .pipe(sass(config.settings))
        .on('error', handleErrors)
        .pipe(autoprefixer({browsers: ['last 2 version']}))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(config.dest));
});
