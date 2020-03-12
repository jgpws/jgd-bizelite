/* Gulpfile.js */

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

function style() {
  return gulp.src([
    './sass/**/*.scss',
    '!./sass/editor-style.scss',
    '!./sass/gutenberg-editor-style.scss',
    '!./sass/gutenberg-colors.scss'], { sourcemaps: true })
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded',
    }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./', { sourcemaps: '.' }))
    .pipe(browserSync.stream());
}

function editorStyle() {
  return gulp.src([
    './sass/editor-style.scss',
    './sass/gutenberg-editor-style.scss',
    './sass/gutenberg-colors.scss'], { sourcemaps: true })
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded',
    }).on('error', sass.logError))
    .pipe(gulp.dest('./css', { sourcemaps: '.' }));
}

function watch() {
  browserSync.init({
    proxy: 'localhost/wordpress/'
  });
  gulp.watch('./sass/**/*.scss', style);
  gulp.watch('./sass/editor-style.scss', editorStyle);
  gulp.watch('./sass/gutenberg-editor-style.scss', editorStyle);
  gulp.watch('./sass/gutenberg-colors.scss', editorStyle);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
  gulp.watch('./scripts/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;
