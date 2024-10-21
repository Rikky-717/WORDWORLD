let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .babelConfig({
      presets: ['@babel/preset-env'],
      sourceType: 'unambiguous'  // すでに追加されたBabelの設定
   })
   .options({
      postCss: [
         require('tailwindcss'),  // Tailwind CSSをPostCSSで使えるように設定
      ],
   });