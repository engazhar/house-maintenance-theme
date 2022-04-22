const path = require('path');
const MinCSSExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const CSSNano = require('cssnano'); // https://cssnano.co/
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');

const entry = {
    main: JS_DIR+'/main.js',
    single: JS_DIR+'/single.js',
}
const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js'
}
const rules = [
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node-modules/,
        use: 'babel-loader'
    },
    {
        test: /\.scss$/,
        include: [ JS_DIR ],
        exclude: /node-modules/,
        use: [
			MinCSSExtractPlugin.loader,
			'css-loader',
		]
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                    publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
                }
		}
    },
    {
		test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
		exclude: [ IMG_DIR, /node_modules/ ],
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
			}
		}
	}
];

/**
 * Note: argv.mode will return 'development' or 'production'.
 */

const plugins = (argv) => [
    new CleanWebpackPlugin ({
        // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
        cleanStaleWebpackAssets: ('production' === argv.mode ),
    }),
    new MinCSSExtractPlugin({
        filename: 'css/[name].css',
    }),
];

module.exports = (env, argv) => ({
    entry:entry,
    output:output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    optimization: {
        minimizer : [
            new OptimizeCssAssetsPlugin({
                cssProcessor: CSSNano

            }),
            new UglifyJSPlugin({
                uglifyOptions: {
                cache: false,
                parallel: true,
                SourceMap: true
                }
            })
        ]
    },
    plugins: plugins(argv),
    externals: 'jQuery'
});