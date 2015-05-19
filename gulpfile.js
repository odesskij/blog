/*global require*/
(function () {
    'use strict';
    var gulp = require('gulp'),
        watch = require('gulp-watch'), //https://github.com/floatdrop/gulp-watch
        jshint = require('gulp-jshint'), // https://github.com/spalger/gulp-jshint
        uglify = require('gulp-uglify'), // github.com/terinjokes/gulp-uglify
        run = require('gulp-run'); // https://github.com/cbarrick/gulp-run

    gulp.task('build-bower', function () {
        var bower = require('main-bower-files');
        var bowerNormalizer = require('gulp-bower-normalize');
        return gulp.src(bower(), {base: './bower_components'})
            .pipe(bowerNormalizer({bowerJson: './bower.json', flatten: true}))
            .pipe(gulp.dest('./web/resources'));
    });

    gulp.task('build-dev', ['build-bower'], function () {

    });

    gulp.task('build-prod', ['build-bower'], function () {
        gulp.src('./web/resources/js/**.js')
            .pipe(uglify({
                "mangle": false
            }))
            .pipe(gulp.dest('web/build'));
    });

    gulp.task('unpacking', function () {
        run('bower install').exec();
    });
})();