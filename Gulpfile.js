const gulp = require('gulp');
const sass = require('gulp-sass');
const $ = require('gulp-load-plugins');

gulp.task('sass', function() {
    return gulp.src('webroot/sass/*.sass')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('webroot/css'));
});

gulp.task('watch', function() {
    gulp.watch('webroot/sass/*.sass', gulp.task('sass'));
});

gulp.task('default', gulp.series('sass'));
