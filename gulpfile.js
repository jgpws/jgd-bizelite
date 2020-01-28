const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

function style() {
  return gulp.src('./sass/**/*.scss', { sourcemaps: true })
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded',
    }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./', { sourcemaps: '.' }));
}

function watch() {
  gulp.watch('./sass/**/*.scss', style);
}

exports.style = style;
exports.watch = watch;
