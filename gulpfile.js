/* Gulpfile.js */

const gulp = require("gulp");

const del = require("del");
const zip = require("gulp-zip");

const { series } = require("gulp");

function copyMainFiles(done) {
  gulp
    .src([
      "./*.php",
      "!./dist/*.php",
      "./*.css",
      "!./dist/*.css",
      "readme.txt",
      "!./dist/readme.txt",
      "./screenshot.png",
      "!./dist/screenshot.png",
    ])
    .pipe(gulp.dest("./dist"));
  done();
}

function copyCSS(done) {
  gulp.src("./css/*css").pipe(gulp.dest("./dist/css"));
  done();
}

function copyFonts(done) {
  gulp.src("./fonts/*").pipe(gulp.dest("./dist/fonts"));
  done();
}

function copyImgs(done) {
  gulp.src("./images/*").pipe(gulp.dest("./dist/images"));
  done();
}

function copyInc(done) {
  gulp.src("./inc/*.php").pipe(gulp.dest("./dist/inc"));
  done();
}

function copyOpts(done) {
  gulp.src("./options/*.php").pipe(gulp.dest("./dist/options"));
  done();
}

function copyOrig(done) {
  gulp.src("./original/*").pipe(gulp.dest("./dist/original"));
  done();
}

function copyPageTmplts(done) {
  gulp.src("./page-templates/*.php").pipe(gulp.dest("./dist/page-templates"));
  done();
}

function copyScripts(done) {
  gulp.src("./scripts/*.js").pipe(gulp.dest("./dist/scripts"));
  done();
}

function copyTempParts(done) {
  gulp.src("./template-parts/*.php").pipe(gulp.dest("./dist/template-parts"));
  done();
}

function zipUp() {
  return gulp
    .src("./dist/**/*")
    .pipe(zip("jgd-bizelite.zip"))
    .pipe(gulp.dest("./dist"));
}

function clean() {
  return del("./dist/**/*");
}

function cleanAfterZip() {
  return del(["./dist/**/*", "!./dist/jgd-bizelite.zip"]);
}

exports.copyFiles = series(
  clean,
  copyMainFiles,
  copyCSS,
  copyFonts,
  copyImgs,
  copyInc,
  copyOpts,
  copyOrig,
  copyPageTmplts,
  copyScripts,
  copyTempParts,
);
exports.zipUp = zipUp;
exports.clean = clean;
exports.finishUp = series(zipUp, cleanAfterZip);
