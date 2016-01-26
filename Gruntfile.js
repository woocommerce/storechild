/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	grunt.initConfig({
		
		// JavaScript linting with JSHint.
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'js/*.js',
				'!js/*.min.js'
			]
		},

		// Minify .js files.
		uglify: {
			options: {
				preserveComments: 'some'
			},
			main: {
				files: [{
					expand: true,
					cwd: 'js/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: 'js/',
					ext: '.min.js'
				}]
			}
		},

		// Compile all .scss files.
		sass: {
			dist: {
				options: {
					require: 'susy',
					sourcemap: 'none',
					includePaths: ['node_modules/susy/sass'].concat( require( 'node-bourbon' ).includePaths )
				},
				files: [{
					'style.css': 'style.scss'
				}]
			}
		},

		// Watch changes for assets.
		watch: {
			css: {
				files: [
					'style.scss'
				],
				tasks: [
					'sass'
				]
			}
		},
		
		// RTLCSS
		rtlcss: {
			options: {
				config: {
					swapLeftRightInUrl: false,
					swapLtrRtlInUrl: false,
					autoRename: false,
					preserveDirectives: true
				}
			},
			main: {
				expand: true,
				ext: '-rtl.css',
				src: [
					'style.css'
				]
			}
		}
	});
	
	// Load required libraries and modules
	var fs = require('fs');
	require('colors');

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-rtlcss' );

	// Register tasks
	grunt.registerTask( 'default', [
		'css',
		'jshint',
		'uglify'
	]);

	grunt.registerTask( 'css', [
		'sass',
		'rtlcss',
		'rtlcss:rename'
	] );
	
	grunt.registerTask( 'rtlcss:rename', function() {
		var rename = {
			'style-rtl.css': 'rtl.css'
		};
		Object.keys(rename).forEach(function(file) {
			fs.renameSync(file, rename[file]);
			console.log('Renamed %s to %s', file.cyan, rename[file].cyan);
		});
	} );
	
};