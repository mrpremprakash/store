module.exports = {
    entry: './resources/views/main.js',
    output: {
        filename: './assets/js/bundle.js'
    },
    module: {
      loaders: [
        {
          test: /.jsx?$/,
          loader: 'babel-loader',
          exclude: /node_modules/,
          query: {
            presets: ['es2015', 'react']
          }
        }
      ]
  }
};
