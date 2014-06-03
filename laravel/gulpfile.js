// Include gulp
var gulp = require('gulp');

var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
//var sass   = require('gulp-ruby-sass');
var watch  = require('gulp-watch');
var compass = require('gulp-compass');

// Copy assets to public folder
gulp.task('copy', function() {
    // Copy jQuery and Modernizr to public-folder
    gulp.src(['jquery/dist/jquery.js', 'modernizr/modernizr.js'], {cwd: 'bower_components'})
        .pipe(uglify({mangle: true}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/assets/js/'));

    // Concatenate the necessary Foundation javascript files to public-folder
    gulp.src(['fastclick/lib/fastclick.js', 'foundation/js/foundation.js', 'foundation/js/foundation/foundation.*.js'], {cwd: 'bower_components'})
        .pipe(concat('foundation.min.js'))
        .pipe(uglify({mangle: true}))
        .pipe(gulp.dest('public/assets/js/'));

    // Move MathJax.js to public-folder
//    gulp.src(['MathJax/MathJax.js'], {cwd: 'bower_components'})
//        .pipe(rename({suffix: '.min'}))
//        .pipe(gulp.dest('public/assets/js/'));
//
//    gulp.src(['MathJax/extensions/**'], {cwd: 'bower_components'})
//        .pipe(gulp.dest('public/assets/js/extensions'));

    // You first need to perform 'npm install && grunt' within the bower_components/chosen folder
    gulp.src(['chosen/public/chosen.jquery.js'], {cwd: 'bower_components'})
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify({mangle: true}))
        .pipe(gulp.dest('public/assets/js/'));
});

gulp.task('compass', function() {
    return gulp.src(['public/assets/scss/style.scss'])
        .pipe(compass({
            'style': 'compressed',
            'sass': 'public/assets/scss',
            'image': 'public/assets/img',
            'css': 'public/assets/css'
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/assets/css/'))
});

gulp.task('watch', function() {
    gulp.watch('public/assets/scss/**/*.scss', ['compass']);
});

gulp.task('default', ['compass', 'watch']);