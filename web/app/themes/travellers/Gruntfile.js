module.exports = function(grunt) {
    
require('time-grunt')(grunt);
require('jit-grunt')(grunt);

grunt.initConfig({
    jshint: {
        files: ['Gruntfile.js', 'js/**/*.js'],
        options: {
            globals: {
                jQuery: true
        }
    }

},
sass: {
    options: {
        sourceMap: true,
        // outputStyle: 'compressed'
    },
    modern : {
        files: { 
            'css/style.css' : 'sass/style.scss',
            'css/style--legacy.css' : 'sass/style--legacy.scss',
            'css/style--fallback.css' : 'sass/style--fallback.scss',
            'css/select2.css' : 'sass/select2.scss'
        }
    }
},
watch: {
    styles: 
    {
        files: ['sass/**/*.scss'],
        tasks: [ 'sass', 'autoprefixer']
    },
    // js: 
    // {
    //     files: ['js/**/*.js'],
    //     tasks: [ 'sass', 'autoprefixer']
    // },
},
browserSync: {
    bsFiles: {
        src : ['css/*.css', 'js/**/*.js', '**/*.php']
    },
    options: {
            proxy: "dev.travellersinn.pl",
            watchTask: true,
            open: false
        }
},
autoprefixer : {
    options : {
      // map:  true,
    },
    multiple_files: {
      expand: true,
      flatten: true,
      src: 'css/*.css', // -> src/css/file1.css, src/css/file2.css
      dest: 'css/' // -> dest/css/file1.css, dest/css/file2.css
    },
},
svgmin: {
    myIcons: {
        files: [{
            expand: true,
            cwd: 'images/svg',
            src: ['*.svg', '*.png'],
            dest: "images/icons"
        }]
    }
},
grunticon: {
    myIcons: {
        files: [{
            expand: true,
            cwd: 'images/svg',
            src: ['*.svg', '*.png'],
            dest: "images/icons"
        }],
        options: {
            datasvgcss : 'icons.data.svg.css',
            datapngcss : 'icons.data.png.css',
            urlpngcss : 'icons.fallback.png.css',
                // pngfolder : 
            }
        }
    },
    uglify: {
        my_target: {
          files: {
            'js/site.min.js': ['js/main.js', 'js/vendor/modernizr.js', 'js/vendor/smoothState.js', 'js/vendor/basic.slider.js' ]
          }
    }
  }
});
    grunt.loadNpmTasks('grunt-notify');

    grunt.registerTask('default', ['svgmin','grunticon', 'sass', 'autoprefixer', 'uglify']);
    grunt.registerTask('bs', ['browserSync', 'watch']);

};