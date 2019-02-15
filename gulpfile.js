"use strict";

var sassSources = "./scss/**/*.scss";
var sassOutput = "./css";

var gulp = require("gulp");
var sass = require("gulp-sass");

sass.compiler = require("node-sass");

gulp.task("sass", function() {
  return gulp
    .src(sassSources)
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest(sassOutput));
});

gulp.task("sass:watch", function() {
  gulp.watch(sassSources, ["sass"]);
});
