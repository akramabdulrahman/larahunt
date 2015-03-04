var gulp = require('gulp');
var config = require('../config');

gulp.task('watch', ['setWatch', 'build'], function() {
    gulp.watch(config.src.assets + '/styles/**', ['sass']);
});
