'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
                files: ['scss/partials/*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer']
            },
            js: {
                files: ['js/dev/*.js','js/lib/*.js'],
                tasks: ['uglify']
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    sourcemap: false,
                    style: 'expanded',
                    require: 'sass-globbing'
                },
                files: {
                    'scss/style.css': 'scss/style.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9', 'ios 6', 'android 4'],
                map: false
            },
            files: {
                expand: true,
                flatten: true,
                src: 'scss/*.css',
                dest: './'
            },
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            main: {
                options: {
                    // sourceMap: 'assets/scripts/build/main.js.map',
                    // sourceMappingURL: 'main.js.map',
                    // sourceMapPrefix: 2,
                    uglify: true
                    // beautify: true
                },
                files: {
                    'js/main.min.js': [
                        'js/dev/main.js'
                    ]
                }
            }
        }

    });

    // register task
    grunt.registerTask('default', ['sass', 'autoprefixer', 'uglify', 'watch']);

};