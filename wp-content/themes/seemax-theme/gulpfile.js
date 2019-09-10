var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var concat = require('gulp-concat-util');
var autoprefixer = require('gulp-autoprefixer');
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var pump = require('pump');

gulp.task('browserSync', function() {
  browserSync.init({
    notify:false,
    proxy: "https://DIRECTORY:LOCAL",
    port: 5000,
    open: "internal"
  })
})

gulp.task('sass', function(cb) {
  return gulp.src('scss/*.scss')
    .pipe(sass())
    .pipe(concat('style.css'))
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({
      stream: true
    }))
    cb(err);
});


// This Funtion Waits for The sass function to complete
gulp.task('css', ['sass'], function() {
  return gulp.src('style.css')
    .pipe(autoprefixer())
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({
      stream: true
    }))
    cb(err);
});


gulp.task('concat', function() {
  gulp.src('js/parts/*.js')
    .pipe(concat('scripts.js', {process: function(src) { return (src.trim() + '\n').replace(/(^|\n)[ \t]*('use strict'|"use strict");?\s*/g, '$1'); }}))
    .pipe(concat.header('(function ($, root, undefined) {$(function () {\n\'use strict\';\n'))
    .pipe(concat.footer('\n});})(jQuery, this);\n'))
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({
      stream: true
    }))
});


gulp.task('lint', ['concat'], function () {
  return gulp.src('scripts.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish', {beep: true}));
});


gulp.task('minify-css', function() {
  return gulp.src('style.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest(''));
});


gulp.task('uglify', function () {
  pump([
        gulp.src('scripts.js'),
        uglify(),
        gulp.dest('')
    ]);
});


gulp.task('watch', ['browserSync', 'sass', 'css', 'concat'], function (){
  gulp.watch('scss/*.scss', ['sass']);
  gulp.watch('style.css', ['css']);
  gulp.watch('*.php', browserSync.reload);
  gulp.watch('partials/*.php', browserSync.reload);
  gulp.watch('js/parts/*.js', ['concat']);
  gulp.watch('scripts.js', ['lint']);
  gulp.watch('js/*.js', browserSync.reload);
});

gulp.task('production', ['minify-css', 'uglify']);
