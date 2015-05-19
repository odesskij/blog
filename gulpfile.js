/*global require*/
(function () {
    'use strict';
    var gulp = require('gulp'),
        gutil = require('gulp-util'),
    // watch = require('gulp-watch'), //https://github.com/floatdrop/gulp-watch
    // jshint = require('gulp-jshint'), // https://github.com/spalger/gulp-jshint
        uglify = require('gulp-uglify'), // github.com/terinjokes/gulp-uglify
    // run = require('gulp-run'), // https://github.com/cbarrick/gulp-run
        bower = require('main-bower-files'), // https://github.com/ck86/main-bower-files
        normalizer = require('gulp-bower-normalize'), // https://github.com/cthrax/gulp-bower-normalize
        gulpif = require('gulp-if'), // https://github.com/robrich/gulp-if
    // ignore = require('gulp-ignore'), // https://github.com/robrich/gulp-ignore
        minifyCss = require('gulp-minify-css'); // https://github.com/jonathanepollack/gulp-minify-css


    var options = {"base": './bower_components'};
    var normalizerOptions = {"bowerJson": './bower.json', "flatten": true};
    var dest = './web/resources';


    gulp.task('build-assets', function () {
        return gulp.src(bower(), options)
            .pipe(normalizer(normalizerOptions))
            /* ---- for dev ---- */
            .pipe(gulpif('**/*.js', uglify().on('error', gutil.log)))
            .pipe(gulpif('**/*.css', minifyCss()))
            /* ---- for dev ---- */
            .pipe(gulp.dest(dest));

    });

    gulp.task('default', ['build-assets'], function () {

    });

})();