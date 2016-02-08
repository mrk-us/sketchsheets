// Dependencies
var gulp = require('gulp'),
    log = require('gulp-util').log,
    rename = require('gulp-rename'),
    jade = require('gulp-jade'),
    stylus = require('gulp-stylus'),
    uglify = require('gulp-uglify'),
    newer = require('gulp-newer'),
    image = require('gulp-image'),
    plumber = require('gulp-plumber'),
    webserver = require('gulp-webserver'),
    sourcemaps = require('gulp-sourcemaps'),
    opn = require('opn');

// Config
var config = {
  watch: './src/**/*.*',
  server: {
    host: 'localhost',
    port: '4000',
    path: '/dist'
  },
  index: {
    src: './src/jade/index.jade',
    destination: 'dist/'
  },
  devicetemplates: {
    src: './src/jade/devicetemplates/index.jade',
    destination: 'dist/devicetemplates'
  },
  icontemplates: {
    src: './src/jade/icontemplates/index.jade',
    destination: 'dist/icontemplates'
  },
  othertemplates: {
    src: './src/jade/othertemplates/index.jade',
    destination: 'dist/othertemplates'
  },
  css: {
    src: './src/styl/app.styl',
    destination: 'dist/css'
  },
  js: {
    src: './src/js/**',
    destination: 'dist/js'
  },
  img: {
    src: './src/img/**',
    destination: 'dist/img'
  },
  sketchsheets: {
    src: './src/sketchsheets/**',
    destination: 'dist/sketchsheets'
  },
  fonts: {
    src: './src/fonts/**',
    destination: 'dist/fonts'
  }
};

// Webserver Config
gulp.task('webserver', function() {
  gulp.src('.')
    .pipe(webserver({
      host: config.server.host,
      port: config.server.port,
      livereload: true,
      directoryListing: false
    }));
});

// Open Browser to http://localhost:3000
gulp.task('openbrowser', function() {
  opn('http://'+ config.server.host +':'+ config.server.port + config.server.path);
});

// Jade w/ option to rename file
gulp.task('index', function() {
  var locs = {};
  return gulp.src(config.index.src)
    .pipe(plumber())
    .pipe(jade({ 
      pretty: true,
      locals: locs 
    }))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(config.index.destination));
});
gulp.task('devicetemplates', function() {
  var locs = {};
  return gulp.src(config.devicetemplates.src)
    .pipe(plumber())
    .pipe(jade({ 
      pretty: true,
      locals: locs 
    }))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(config.devicetemplates.destination));
});
gulp.task('icontemplates', function() {
  var locs = {};
  return gulp.src(config.icontemplates.src)
    .pipe(plumber())
    .pipe(jade({ 
      pretty: true,
      locals: locs 
    }))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(config.icontemplates.destination));
});
gulp.task('othertemplates', function() {
  var locs = {};
  return gulp.src(config.othertemplates.src)
    .pipe(plumber())
    .pipe(jade({ 
      pretty: true,
      locals: locs 
    }))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(config.othertemplates.destination));
});

// Stylus w/ option to rename file
gulp.task('stylus', function() {
  return gulp.src(config.css.src)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(stylus({
      compress: false
    }))
    .pipe(sourcemaps.write())
    .pipe(rename('style.css'))
    .pipe(gulp.dest(config.css.destination));
});

// Javascript
gulp.task('js', function() {
  return gulp.src(config.js.src)
    .pipe(plumber())
    .pipe(gulp.dest(config.js.destination));
});

// Images
gulp.task('img', function() {
  return gulp.src(config.img.src)
    .pipe(plumber())
    .pipe(newer(config.img.destination))
    .pipe(image())
    .pipe(gulp.dest(config.img.destination));
});
gulp.task('sketchsheets', function() {
  return gulp.src(config.sketchsheets.src)
    .pipe(plumber())
    .pipe(newer(config.sketchsheets.destination))
    .pipe(gulp.dest(config.sketchsheets.destination));
});

// Fonts
gulp.task('fonts', function() {
  return gulp.src(config.fonts.src)
    .pipe(plumber())
    .pipe(gulp.dest(config.fonts.destination));
});

// Watch files
gulp.task('watch', function() {
  log('Watching files');
  gulp.watch(config.watch, ['build']);
});

// Command line tasks
gulp.task('build', ['index', 'devicetemplates', 'icontemplates', 'othertemplates', 'stylus', 'js', 'img', 'sketchsheets', 'fonts']);
gulp.task('w', ['build', 'watch']);
gulp.task('default', ['build', 'webserver', 'watch', 'openbrowser']);
