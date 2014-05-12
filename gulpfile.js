// Include gulp
var gulp = require('gulp');

var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass   = require('gulp-ruby-sass');
var watch  = require('gulp-watch');

// Copy assets to public folder
gulp.task('copy', function() {
    // Copy jQuery and Modernizr to public-folder
    gulp.src(['jquery/dist/jquery.js', 'modernizr/modernizr.js'], {cwd: 'bower_components'})
        .pipe(uglify({mangle: true}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/assets/js/'));

    // Concatenate the necessary Foundation javascript files to public-folder
    gulp.src(['fastclick/lib/fastclick.js', 'foundation/js/foundation.js', 'foundation/js/foundation/**/*.js'], {cwd: 'bower_components'})
        .pipe(concat('foundation.min.js'))
        .pipe(uglify({mangle: true}))
        .pipe(gulp.dest('public/assets/js/'));

    // Move the scss Foundation files to public-folder
    gulp.src('bower_components/foundation/scss/**')
        .pipe(gulp.dest('public/assets/scss'));
});

gulp.task('sass', function() {
    return gulp.src('public/assets/scss/foundation.scss')
        .pipe(sass({style: 'compressed'}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/assets/css/'))
});

gulp.task('watch', function() {
    gulp.watch('public/assets/scss/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);