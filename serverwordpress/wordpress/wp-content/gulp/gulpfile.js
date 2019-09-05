var gulp = require('gulp');
settings = require('./settings');
var browserSync = require('browser-sync').create(); // create a browser sync instance.

gulp.task('browser-sync', function() {
    browserSync.init({
        /* server: {
            baseDir: settings.themeLocation
        }, */

        injectChanges: true,
        proxy: settings.urlToPreview

    });

    gulp.watch([settings.themeLocation +'**/*.php', settings.themeLocation + 'css/*.css', settings.themeLocation + 'js/*.js' ], function(done) {
        browserSync.reload();  done();
      });
        
      /* gulp.watch(settings.themeLocation + 'css/*.css');
       gulp.watch([settings.themeLocation + 'js/*.js', settings.themeLocation + 'js/custom.js']); */
    
    
});
