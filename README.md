 <p align="center"><img src="https://zuid.com/wp-content/uploads/2018/01/Logo-ZUID-Creatives-Black-Transparent.svg" width="200"></p>

# Alku

Zuipress is a minimal WordPress starter theme built with modern tooling and sensible defaults.

## Features

- [Webpack](https://webpack.js.org) for modern JavaScript development
- [Laravel Mix](https://laravel-mix.com) for easy Webpack configuration
- [Browsersync](https://browsersync.io) for synchronized browser testing
- [npm](https://www.npmjs.com) for front-end package management
- [Sass](https://sass-lang.com) for stylesheets, with sensible defaults for colors, typography, etc.
- [Mixins](https://github.com/nlenkowski/blujay/blob/master/assets/styles/common/_helpers.scss) for easily defining and using named breakpoints
- [Shortcodes](https://github.com/nlenkowski/blujay/blob/master/lib/shortcodes.php) for adding flexbox columns to pages and posts
- [ESLint](https://eslint.org) and [stylelint](https://stylelint.io) for linting scripts and styles
- [Setup](https://github.com/nlenkowski/blujay/blob/master/lib/setup.php) functions for registering assets, menus, image sizes, sidebars, etc.
- [Helper](https://github.com/nlenkowski/blujay/blob/master/lib/helpers.php) functions for cleaning up the header, moving scripts to the footer, etc.

## Requirements

- [WordPress](https://wordpress.org/) >= 4.7
- [PHP](https://secure.php.net/) >= 7.1
- [Node](https://nodejs.org/) >= 6.14

## Theme Installation

1. Download the latest version and unzip it into your `/wp-content/themes` directory.

2. Run `npm install` from the theme directory to install dependencies.

3. Run `npm run prod` to compile and optimize assets for production.

## Theme Development

1. Edit `/lib/setup.php` to enable and/or disable theme features and register assets, menus, image sizes, sidebars, etc.

2. Edit `/webpack.mix.js` and change the browserSync `proxy` to reflect your local development url.

### Build Commands

Compiled assets are output to the `/dist` directory.

- `npm run dev` – Compiles assets and generates source maps for development

- `npm run prod` – Compiles and optimizes assets for production

- `npm run watch` – Starts a Browsersync session and compiles assets when changes are detected

- `npm run zuid-sync` – This give you information about the available sync options for dumping uploads, plugins and database for live or dev

- `npm run zuid-sync dev deploy` – This will deploy the theme files to the (dev) server. To use this you first need to change .env.example to .env and change the variables

### Package Management

Example of how to include npm packages in your theme:

1. Install package

```sh
npm install flatpickr
```

2. Add the stylesheet entry points to `/assets/styles/main.scss`

```css
@import "~flatpickr/dist/flatpickr.css";
```

3. Add the script entry points to `/assets/scripts/main.js`

```js
import flatpickr from "flatpickr";
```

4. Run any build command to compile the imported package assets along with your own.

## Theme structure

```
/themes/alku         # → Theme root
├── sync                  # → Node sync folder for dumping and scripts (never edit)
├── assets                # → Theme assets
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme scripts
│   └── styles/           # → Theme styles
├── dist/                 # → Compiled assets (never edit)
├── lib/                  # → Theme code library
├── node_modules/         # → Node packages (never edit)
├── partials/             # → Partial templates
├── functions.php         # → Theme functions
├── package.json          # → Node dependencies
├── package-lock.json     # → Dependencies lock file (never edit)
├── style.css             # → Theme meta information
├── webpack.mix.js        # → Mix/Webpack configuration
```

### Assets

- `/assets/fonts` – Font source files
- `/assets/images` – Image source files
- `/assets/scripts` – JavaScript source files
- `/assets/styles` – Sass source files
- `/assets/styles/common` – Common styles (variables, global, helpers, etc.)
- `/assets/styles/components` – Component styles (columns, comments, etc.)
- `/assets/styles/layouts` – Layouts styles (header, footer, pages, etc.)

### Lib

- `/lib/setup.php` – Enables theme features and registers assets, menus, image sizes, sidebars, etc.
- `/lib/helpers.php` – Theme utilities for cleaning up the header, moving scripts to the footer, etc.
- `/lib/shortcodes.php` – Registers shortcodes

## Up to date with sync

```npm zuid-sync dev/live db/plugins/uploads/deploy``` will help you stay up to date with live or development uploads, plugins and database.
```npm run zuid-sync dev deploy``` also helps faster pushes and eliminates the use of a ftp client. This will only deploy the theme files.
rename .env.example to .env and change the variables to run the script.

## Thanks

Alku is heavily inspired by [Blujay](https://blujay.littlebiglab.com/) that customizes the needs for [ZUID Creatives](https://zuid.com/).
Blujay was inspired by the excellent [Sage](https://roots.io/sage/) starter theme by [Roots](https://roots.io/).
