var webpack = require('webpack');

var path = require('path');

var LiveReloadPlugin = require('webpack-livereload-plugin');
var ExtractTextPlugin = require("extract-text-webpack-plugin");
var StyleLoaderPlugin = require('style-loader');

const internalCSS = new ExtractTextPlugin('./critical.php');
const externalCSS = new ExtractTextPlugin('./css/style.css');

var LiveReloadPlugin = require('webpack-livereload-plugin');

//$env:NODE_ENV="production"
var inProduction = (process.env.NODE_ENV === 'production');

module.exports = {
    entry: {
            assets: ['./src/sass/screen.scss', './src/sass/critical.scss', './src/js/scripts/index.js'],
           },
    
    output: {
        path: path.resolve(__dirname, './dest'),
        filename: './js/bundle.js'      
    },

    module: {
        rules: [

            {
                
                test: /screen.scss/,
                use: externalCSS.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: "style-loader",
                })

            },

            {
                test: /critical.scss/,
                use: internalCSS.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: "style-loader",
                }),
            },

            {
              test: /\.js$/,
              use: { 
                        loader: 'babel-loader',
                        query: { presets: ['es2015'] } 
                    }
            }

        ]
            
    },

    plugins: [

        internalCSS,
        externalCSS,
 
        new webpack.LoaderOptionsPlugin({
            
            minimize: inProduction

        }),

        new LiveReloadPlugin()
    ]
};

if (process.env.NODE_ENV === 'production') {
    
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin({
            parallel: true,
            sourceMap: true
        })
    )

}