var gulp = require('gulp');

var sass = require('gulp-sass');

var browserSync = require('browser-sync').create();
var reload = browserSync.reload;


// Html task
gulp.task('html', function () {
	gulp.src('application/views/*.php')
		.pipe(reload({
			stream: true
		}));
});

// Compile SCSS
gulp.task('sass', function () {
	return gulp.src('./assets/scss/*.scss')
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(gulp.dest('./assets/css/'));
});

// php connect
gulp.task('serve', function () {
	php.server({
		src: "application/views/*.php",
		port: 80, // Port (8000 par défaut)
		base: './' // Base du projet
	});
});

// Browser task
gulp.task('browser-sync', function () {
	browserSync.init({
		proxy: '127.0.0.1',
		port: 8000
	});
});

// Task default, Local webserve dan sinkronisasi dengan browser
gulp.task('watch', function () {
	gulp.watch('application/views/*.php', ['html']);
	gulp.watch('./assets/**/*').on('change', reload);
	gulp.watch('./assets/scss/*.scss', ['sass']);
});


gulp.task('default', ['browser-sync', 'watch', 'serve']);
