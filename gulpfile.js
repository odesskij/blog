/*global require*/
(function () {
    'use strict';
    var gulp = require('gulp'),
        watch = require('gulp-watch');

    gulp.task('default', function () {
        var bower = require('main-bower-files');
        var bowerNormalizer = require('gulp-bower-normalize');
        return gulp.src(bower(), {base: './bower_components'})
            .pipe(bowerNormalizer({bowerJson: './bower.json', flatten: true}))
            .pipe(gulp.dest('./web/resources'));
    });
})();