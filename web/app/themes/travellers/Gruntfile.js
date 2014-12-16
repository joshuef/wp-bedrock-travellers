module.exports = function(grunt) {

  grunt.initConfig({
    // jshint: {
    //   files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
    //   options: {
    //     globals: {
    //       jQuery: true
    //     }
    //   }
    // },
    watch: {
      files: ['<%= jshint.files %>'],
      tasks: ['jshint']
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

  // grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-grunticon');

    grunt.registerTask('default', ['jshint']);

};