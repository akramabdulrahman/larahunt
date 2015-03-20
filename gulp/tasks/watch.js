'use strict';

var gulp = require('gulp');
var config = require('../config');

gulp.task('watch', ['default'], function() {
    gulp.watch(config.styles.src, ['styles']);
});
