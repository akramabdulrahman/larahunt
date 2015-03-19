'use strict';

var gulp = require('gulp');
var config = require('../config');

gulp.task('watch', ['build'], function() {
    gulp.watch(config.styles.src, ['styles']);
});
