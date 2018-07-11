'use strict';

var gulp = require('gulp');

var inputDir = './src';
var outputDir = './dest';

gulp.task('watch', function() {
	gulp.watch(inputDir + '/sass/**/*.scss', ['css']);
    gulp.watch(inputDir + '/js/**/*.js', ['js']);
	gulp.watch(inputDir + '/img/**', ['images']);
});
