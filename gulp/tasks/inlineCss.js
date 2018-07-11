'use strict';

var gulp = require('gulp');
var insert = require('gulp-insert');
var fs = require('fs');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var handleErrors = require('../util/handleErrors');

gulp.task('inlineCss', ['sass'], function() {

    var styles = fs.readFileSync('dest/css/critical.css', 'utf8');

    return gulp.src('./_generated/blank.txt')
        .pipe(insert.append('<style>' + styles + '</style>'))
        .on('error', handleErrors)
        .pipe(rename('critical-assets-css.php'))
        .pipe(gulp.dest('./_generated'))
        .pipe(notify('CSS inlined.'));
});
