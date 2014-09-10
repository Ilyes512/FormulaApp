// Include gulp
// Todo: clean up these dependencies
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-ruby-sass');
//var watch  = require('gulp-watch');
var compass = require('gulp-compass');
//var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
    gulp.src('./app/assets/scss/main.scss')
        .pipe(sass({style:"nested"})) // nested, compact, compressed, expanded
        .pipe(gulp.dest('./public/assets/css/'));
});

gulp.task('js', function() {
    gulp.src('./app/assets/js/main.js')
        .pipe(rename({suffix: ".min"}))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/js/'));
});

gulp.task('copy', function() {
    // jQuery
    gulp.src('./bower_components/jquery/dist/jquery.min.js')
        .pipe(rename({suffix: "-2.1.1"}))
        .pipe(gulp.dest('./public/assets/js/'));

    // Bootstrap3-scss
    gulp.src('./bower_components/bootstrap-sass-official/assets/stylesheets/bootstrap/**')
        .pipe(gulp.dest('./app/assets/scss/bootstrap/'));
    gulp.src('./bower_components/bootstrap-sass-official/assets/fonts/bootstrap/**')
        .pipe(gulp.dest('./public/assets/fonts/'));
    gulp.src('./bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js')
        .pipe(uglify())
        .pipe(rename({suffix: "-3.2.0.min"}))
        .pipe(gulp.dest('./public/assets/js/'));

    // Fontawesome fonts + scss styles
    gulp.src('./bower_components/fontawesome/fonts/**')
        .pipe(gulp.dest('./public/assets/fonts/'));
    gulp.src('./bower_components/fontawesome/scss/**')
        .pipe(gulp.dest('./app/assets/scss/fontawesome/'));

    // Modernizr
    // todo: get version automagically and minify the file
    gulp.src('./bower_components/modernizr/modernizr.js')
        .pipe(rename({suffix: "-2.8.3.min"}))
        .pipe(gulp.dest('./public/assets/js/'));

    // Selectize + scss styles
    gulp.src('./bower_components/selectize/dist/js/standalone/selectize.min.js')
        .pipe(rename({suffix: "-0.11.0"}))
        .pipe(gulp.dest('./public/assets/js/'));
    gulp.src('./bower_components/selectize-scss/src/**')
        .pipe(gulp.dest('./app/assets/scss/selectize/'));
});

gulp.task('watch', function() {
    gulp.watch('./app/assets/scss/**/*.scss', ['css']);
    gulp.watch('./app/assets/js/main.js', ['js'])
});

gulp.task('default', ['css', 'watch']);