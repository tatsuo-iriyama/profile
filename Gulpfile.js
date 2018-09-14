var gulp = require('gulp');
var sass = require('gulp-sass');
var $ = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('webroot/sass/*.sass')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('webroot/css'));

    gulp.src('webroot/sass/Relivers/*.sass')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('webroot/css/Relivers'));

    gulp.src('webroot/sass/v3/**/*.sass')
        .pipe($.sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('webroot/css/v3'));
});

gulp.task('svg', function () {
    var directories = [
        'webroot/img/sprite/ui-icons/*.svg',
        'webroot/img/sprite/category-icons/*.svg',
        'webroot/img/sprite/mypage-statuses/*.svg',
    ];

    directories.forEach(function (directory) {
        gulp.src(directory)
            .pipe($.svgmin())
            .pipe($.svgstore({ inlineSvg: true }))
            .pipe($.cheerio({
                run: function ($, file) {
                    // マイページ用ステップ画像のときだけ、fillは取り除かない
                    if (!directory.indexOf('mypage-statuses')) {
                        $('[fill]').removeAttr('fill');
                    }
                },
                parserOptions: { xmlMode: true }
            }))
            .pipe(gulp.dest('webroot/img/sprite'));
    });
});

gulp.task('watch', function() {

    // watch sass
    gulp.watch('webroot/sass/*.sass', ['sass']);
    gulp.watch('webroot/sass/Relivers/*.sass', ['sass']);
    gulp.watch('webroot/sass/v3/*.sass', ['sass']);

});

gulp.task('default', ['sass']);
