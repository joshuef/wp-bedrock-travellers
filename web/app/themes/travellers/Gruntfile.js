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
    libsass: {
        modern : {
            dest: 'css/style.css',
            src: 'sass/style.scss'
        },
        dataPng : {
            dest: 'css/png.css',
            src: 'sass/png.scss'
        },
        fallback : {
            dest: 'css/fallback.css',
            src: 'sass/fallback.scss'
        }
    },
    watch: {
      files: ['sass/**/*.scss'],
      tasks: [ 'libsass']
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

    grunt.registerTask('default', ['grunticon', 'libsass']);

};