const path = require('path');
const MinCSSExtractPlugin = require('mini-css-extract-plugin');

const JS_DIR = path.resolve(__dirname, '/src/js');
const IMG_DIR = path.resolve(__dirname, '/src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');

const entry = {
    main: JS_DIR+'/main.js',
    main: JS_DIR+'/single.js',
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
];
module.exports = (env, argv) => ({
    entry:entry,
    output:output,
    devtool: 'source-map',
    module: {
        rules: rules,
    }
});