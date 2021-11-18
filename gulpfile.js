/* Gulpfile.js */

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const uglifyJS = require('gulp-uglify');
const uglifyCSS = require('gulp-uglifycss');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();

const del = require('del');
const zip = require('gulp-zip');

const { series } = require('gulp');

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

function minifyStyle() {
  return gulp.src('./style.css')
    .pipe(uglifyCSS({
      'maxLineLen': 80
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./'));
}

function minifyJS() {
  return gulp.src('./scripts/jgd-bizelite-scripts.js')
    .pipe(uglifyJS())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./scripts'));
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
  gulp.watch('./sass/**/*.scss', series(style, minifyStyle));
  gulp.watch('./sass/editor-style.scss', editorStyle);
  gulp.watch('./sass/gutenberg-editor-style.scss', editorStyle);
  gulp.watch('./sass/gutenberg-colors.scss', editorStyle);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
  gulp.watch('./scripts/jgd-bizelite-scripts.js', minifyJS);
  gulp.watch('./scripts/**/*.js').on('change', browserSync.reload);
}

function copyMainFiles(done) {
  gulp.src([
		'./*.php',
		'!./dist/*.php',
		'./*.css',
		'!./dist/*.css',
		'readme.txt',
		'!./dist/readme.txt',
		'./screenshot.png',
		'!./dist/screenshot.png'
	])
    .pipe(gulp.dest('./dist'));
  done();
}

function copyCSS(done) {
  gulp.src('./css/*css')
    .pipe(gulp.dest('./dist/css'));
  done();
}

function copyFonts(done) {
  gulp.src('./fonts/*')
    .pipe(gulp.dest('./dist/fonts'));
  done();
}

function copyImgs(done) {
  gulp.src('./images/*')
    .pipe(gulp.dest('./dist/images'));
  done();
}

function copyInc(done) {
  gulp.src('./inc/*.php')
    .pipe(gulp.dest('./dist/inc'));
  done();
}

function copyOpts(done) {
  gulp.src('./options/*.php')
    .pipe(gulp.dest('./dist/options'));
  done();
}

function copyOrig(done) {
  gulp.src('./original/*')
    .pipe(gulp.dest('./dist/original'));
  done();
}

function copyPageTmplts(done) {
  gulp.src('./page-templates/*.php')
    .pipe(gulp.dest('./dist/page-templates'));
  done();
}

function copySass(done) {
  gulp.src('./sass/**/*.scss')
    .pipe(gulp.dest('./dist/sass'));
  done();
}

function copyScripts(done) {
  gulp.src('./scripts/*.js')
    .pipe(gulp.dest('./dist/scripts'));
  done();
}

function copyTempParts(done) {
  gulp.src('./template-parts/*.php')
    .pipe(gulp.dest('./dist/template-parts'));
  done();
}

function zipUp() {
  return gulp.src('./dist/**/*')
    .pipe(zip('jgd-bizelite.zip'))
    .pipe(gulp.dest('./dist'));
}

function clean() {
  return del('./dist/**/*');
}

function cleanAfterZip() {
  return del([
		'./dist/**/*',
		'!./dist/jgd-bizelite.zip'
	]);
}

exports.style = style;
exports.minifyStyle = minifyStyle;
exports.minifyJS = minifyJS;
exports.watch = watch;
exports.copyFiles = series(clean, copyMainFiles, copyCSS, copyFonts, copyImgs, copyInc, copyOpts, copyOrig, copyPageTmplts, copyScripts, copyTempParts);
exports.zipUp = zipUp;
exports.clean = clean;
exports.finishUp = series(zipUp, cleanAfterZip);
