// eslint-disable-next-line no-undef
const mix = require("laravel-mix")

mix
  .js("assets/scripts/main.js", "dist/scripts")
  .sass("assets/styles/main.scss", "dist/styles").options({processCssUrls: false})
  .copyDirectory("assets/fonts", "dist/fonts")
  .copyDirectory("assets/images", "dist/images", false)
  .copyDirectory("assets/images/svg", "dist/images/svg")

// Enable Browsersync and source maps for development builds only
if (!mix.inProduction()) {
  mix.webpackConfig({ devtool: "inline-source-map" })
  mix.browserSync({
    proxy: "https://www.otap.test",
    open: true,
    notify: false,
    files: ["dist/styles/**/*.css", "dist/scripts/**/*.js", "**/*.php"],
    snippetOptions: {
      ignorePaths: ["admin/**"]
    }
  })
}
