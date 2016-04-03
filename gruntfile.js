module.exports = function( grunt ) {
    grunt.initConfig( {
    pkg: grunt.file.readJSON( "package.json" ),
    php: {
        dist: {
            options: {
                port: 9000
            }
        }
    }
  } );

  grunt.loadNpmTasks( "grunt-php" );

  grunt.registerTask('default', ['php']);
};
