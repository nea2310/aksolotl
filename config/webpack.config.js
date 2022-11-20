const ESLintPlugin = require('eslint-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const path = require('path');

const root = path.join(__dirname, '../');
const src = path.join(__dirname, '../src');
const dist = path.join(__dirname, '../dist');

let mode = 'development';
if (process.env.NODE_ENV === 'production') {
  mode = 'production';
}

module.exports = {
  resolve: {
    alias: {
      '@': src,
      '@pub': `${root}/public`,
      '@fav': `${src}/assets/favicons`,
      '@com': `${src}/components`,
      '@styles': `${src}/assets/styles`,
    },
  },

  mode,
  entry: `${src}/index.js`,
  output: { path: dist },
  plugins: [

    new ESLintPlugin(),

    new CleanWebpackPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [['@babel/preset-env', { targets: '> 0.25%, not dead' }]],
            cacheDirectory: true,
          },
        },
      },
      {
        test: /\.(png|svg|jpg|jpeg|gif|ico)$/i,
        type: 'asset/resource',
        generator: {
          filename: 'assets/images/[name].[hash][ext]',
        },
      },
    ],
  },
};
