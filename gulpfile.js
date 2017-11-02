var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

var sassSources = './scss/**/*.scss';
var sassOutput = './css';
var htmlSource = '**/*.html';


gulp.task('sass', function () {
  return gulp.src(sassSources)
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(sassOutput))
});

gulp.task('default', function () {
  gulp.watch(sassSources, ['sass'])
});
















