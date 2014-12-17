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
        dest: 'css/style--legacy.css',
        src: 'sass/style--legacy.scss'
    },
    fallback : {
        dest: 'css/style--fallback.css',
        src: 'sass/style--fallback.scss'
    }
},
watch: {
    files: ['sass/**/*.scss'],
    tasks: [ 'libsass']
},
browserSync: {
    bsFiles: {
        src : 'css/*.css'
    },
    options: {
            proxy: "dev.travellersinn.pl",
            watchTask: true
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
            datasvgcss : 'icons.data.svg.scss',
            datapngcss : 'icons.data.png.scss',
            urlpngcss : 'icons.fallback.png.scss',
                // pngfolder : 
            }
        }
    }
});

    grunt.registerTask('default', ['grunticon', 'libsass']);
    grunt.registerTask('bs', ['browserSync', 'watch']);

};