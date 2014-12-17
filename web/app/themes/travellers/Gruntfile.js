module.exports = function(grunt) {

require('load-grunt-tasks')(grunt);

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
        outputStyle: 'compressed'
    },
    modern : {
        files: { 
            'css/style.css' : 'sass/style.scss',
            'css/style--legacy.css' : 'sass/style--legacy.scss',
            'css/style--fallback.css' : 'sass/style--fallback.scss',
        }
    }
},
watch: {
    files: ['sass/**/*.scss'],
    tasks: [ 'sass']
},
browserSync: {
    bsFiles: {
        src : ['css/*.css', 'js/*.js', '**/*.php']
    },
    options: {
            proxy: "dev.travellersinn.pl",
            watchTask: true
        }
},
autoprefixer : {
    options : {
      map:  true,
    },
    multiple_files: {
      expand: true,
      flatten: true,
      src: 'css/*.css', // -> src/css/file1.css, src/css/file2.css
      dest: 'css/' // -> dest/css/file1.css, dest/css/file2.css
    },
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
            datasvgcss : 'icons.data.svg.scss',
            datapngcss : 'icons.data.png.scss',
            urlpngcss : 'icons.fallback.png.scss',
                // pngfolder : 
            }
        }
    }
});

    grunt.registerTask('default', ['grunticon', 'sass', 'autoprefixer']);
    grunt.registerTask('bs', ['browserSync', 'watch']);

};