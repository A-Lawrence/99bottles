var gulp = require('gulp');
var phpunit = require('gulp-phpunit');
var run = require('gulp-run');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var path = require('path');

gulp.task('test', function() {
    gulp.src('tests/**/*.php')
        .pipe(phpunit('', { notify: false }))
        .on('error', notify.onError({
            title: "Fatal blow...",
            message: "If you're not failing, you're not trying hard enough.",
            icon: path.join(__dirname, "/failure.png")
        }))
        .pipe(notify({
            title: "Elon would be proud!",
            message: "All green, and good to go!",
            icon: path.join(__dirname, "/success.png")
        }));
});

gulp.task('watch', function() {
    gulp.watch(['tests/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);