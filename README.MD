# Wordpress Theme Kickstarter by Michele Mincone
This repository contains the kickstarter code to rapidly run a WordPress theme jumping straight to the developing phase without the need to setup everything manually.

The setup starts from an initial configuration in object oriented PHP to init the theme, supports and assets. Custom fields are handled with Carbon Fields.

The frontend part is configured with Typescript, React and TailwindCSS.

You can see inside `package.json` file all the dependencies downloaded.

`tailwind.config.js` file was setup together with `postcss.config.js` to properly configure tailwindcss.

`tsconfig.json` was added to configure Typescript and the file `.babelrc` was configured for presets, React JSX and Typescript.

**NOTE:** In the future I will improve this kickstarter template or add more pieces of code to provide more features.

# Info
- Author: Michele Mincone
- Website: (https://michelemincone.com)[https://michelemincone.com]
- Date of development: 14 November 2024
- Frontend stack: React, Typescript and Tailwind
- Server side part: PHP OOP + composer for dependencies

# Getting started
To get started with this kickstarter you have to:

Create a theme folder inside your wordpress installation inside `wp-content/themes`

Clone this repo inside your current working directory:

```git clone https://github.com/mikeisadev/mm-kickstarter-wp-theme.git```

Then run:

```npm install```

This command will install all node modules and create the "node_modules" folder for the frontend part.

And also run:

```composer install```

This command will install carbon fields for the server side part via composer. 

**NOTE:** If you don't have composer you have to install it from the official website.

Now everything is good to go and you can start building your theme.

# Build frontend files
To build the frontend part of your website (ReactJS, Typescript and Tailwind parts) you will rely on the `src` folder.

Inside the `src` folder you have `index.tsx` where I have the basic code to render a very simple react component that is inside `src/partials/App.tsx`.

Inside `src/interfaces` you'll find the interfaces and types for react components. Instead, inside the `src/@types` folder you'll find all typescript declarations.

The CSS part is inside `styles` folder with a starter file called `styles/main.css`, where the code you'll find is written with tailwind.

So here you'll add all your stylesheets.

In the other folders you'll add react and typescript/javascript files to build the frontend.

If you want to build and compile the frontend code run this command:

```npm run build```

Instead, if you want to build the code while coding it run:

```npm run start```

The code will be compiled while you are programming and updating files inside the `src` folder.

# Notes about the folder structure
The folder structure is very simple, let's see it together:

- **build**: here we'll have all the built, bundled and transpiled frontend files (appears when you run ```npm run build``` or ```npm run start```). Do not modify files here to build the frontend!
- **inc**: this is the includes folder where all PHP server side folders are added and configured to properly code the theme on the logic and abstract level
- **node_modules**: all frontend dependencies (appears after you run ```npm install```)
- **src**: the folder where all the separated frontend files, it's where you actually write the code to build your frontend.
- **vendor**: where all the composer dependencies will be installed (only appears after running ```composer install```). Do not modify PHP files of the dependencies!
- **.babelrc**: this is the babel (javascript compiler/transpiler/polyfiller) configuration file to ensure proper javascript code backward compatibility. This file also ensures the readability of ReactJSX and Typescript codes.
- **.gitignore**: ignore file for git operations.
- **composer.json and composer.lock**: the JSON data structure of composer installations.
- **functions.php**: the base file to start all the PHP server side operations. This file is mandatory.
- **header.php**: the header php/html template of the theme.
- **footer.php**: the footer php/html template of the theme.
- **index.php**: the first page (index) template of the theme.
- **package.json and package-lock.json**: the JSON data structure of all the node dependecies for the frontend.
- **postcss.config.js**: postcss configuration file for autoprefixer and tailwind.
- **readme.md**: this documentation file written in markdown.
- **screenshot.jpg**: the image of this theme, automatically detected from WordPress.
- **style.css**: this file is automatically detected from WordPress where all the theme information are specified as headers inside a CSS comment.
- **tailwind.config.js**: main tailwindcss configuration file.
- **tsconfig.json**: configuration file of typescript.

**NOTE:** Inside the base folder (root directory) you'll insert all the PHP/HTML template files. As you can see, as the same level of pre-added PHP/HTML template files like: ```footer.php```, ```header.php``` and ```index.php```.

Always refer to the official WordPress Theme development documentation for more information: https://developer.wordpress.org/themes/

# How I've setup everything?
This part of the documentation is more about info and less about practice.

It can be useful if you want to practice kickstarting wordpress themes from zero, but also to setup non-wordpress projects especially on the frontend part.

We'll generally see the code. I advice you to open the files I mention next to follow all the procedures in the code.

## Server side + custom fields
The server side part of this theme starts from the ```functions.php``` file. Here I defined two constants, one for the directory path (MM_DIR) and another for the URL path (MM_URL).

Then I required the most important PHP class file, the `inc/class-mm-init.php`.

From this file you can get the instance of the Init class and then call the `init()` function to kickstart the theme.

At the top I resolved the namespace of this class calling ```php use MM\Init;```

Then, I've done:

```php
$Init = Init::get_instance();
$Init->init();
```

To get the instance and initialize everything.

Inside the `Init` class I do basically two things:
- require and instance all the other classes
- require the autoload.php from the vendor folder (composer dependencies) to initialize carbon fields.

We have other two classes:
- `inc/class-mm-assets.php` to load all the frontend CSS and JS files
- `inc/class-mm-theme-supports.php` to add all WP theme supports.

Then, inside the `inc/admin` folder we have PHP classes to build the admin settings page for the wp admin area. 

So these files will build pages only for admins and not in the frontend.

In those files you can use Carbon Fields to create custom settings page and add custom fields. (Click here to see Carbon Fields documentation)[https://docs.carbonfields.net/quickstart.html]

Otherwise you can use built-in WordPress API to build those settings page. (See the documentation by clicking here)[https://developer.wordpress.org/plugins/settings/custom-settings-page/]

## Frontend
Now let's see how I've built the frontend part step by step.

**NOTE: YOU DON'T HAVE TO RUN THOSE COMMANDS, I WANT TO SHOW YOU THE PROCEDURE I'VE FOLLOWED TO CONFIGURE THE FRONTEND PART OF THIS THEME.**

I've built the frontend stack with Typescript, React and Tailwind, so let's see all the commands I run to build this part:

First, init npm:

```npm init -y```

Install @wordpress/scripts:

```npm install --save-dev @wordpress/scripts```


Execute those commands one by one, install React, Typescript and Tailwind:

```npm install react react-dom```
```npm install --save-dev typescript @types/react @types/react-dom```
```npm install --save-dev tailwindcss postcss autoprefixer```

Now let's configure everything.

Run this command to get the setup file for Typescript:

```npx tsc --init```

This will generate 'tsconfig.json' file and do some changes following the code below:

```json
{   
    "compilerOptions": {
        "target": "es2016",
        "module": "commonjs", 
        "jsx": "react-jsx",
        "moduleResolution": "node",
        "allowJs": true,
        "declaration": true,
        "declarationMap": true,
        "emitDeclarationOnly": true,
        "outDir": "./build",
        "declarationDir": "./src/@types",
        "isolatedModules": true,
        "allowSyntheticDefaultImports": true,
        "esModuleInterop": true,
        "forceConsistentCasingInFileNames": true,
        "strict": true,
        "skipLibCheck": true 
    },
    "include": ["./src/**/*", "src/@types/global.d.ts", "src/@types/*.d.ts"],
    "exclude": ["node_modules", "build", "assets", "vendor"]
}
```

So, find the keys of the JSON data structure and replace the values.

Then, run this one to get the setup file for tailwind:

```npx tailwindcss init```

This command will generate the file 'tailwind.config.js', inside this file add this line of code inside ```module.exports = { content: [...] }```

```js
module.exports = {
  content: ['./src/**/*.{js, jsx, ts, tsx, php}'],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Then I've added the 'src' folder at the root level of my wordpress theme folder.

I modified the 'package.json' file adding in the 'scripts' key this code:

```json
"scripts": {
    "start": "wp-scripts start"
    "build": "wp-scripts build"
}
```

Then I've added the "styles" folder inside the "src" one and then, inside the "styles" folder I've added "main.css" file with the following code to setup tailwind:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

To finalize TailwindCSS configuration I've added the 'postcss.config.js' file with the following code:

```js
const autoprefixer = require("autoprefixer");

module.exports = {
    plugins: {
        tailwindcss: {},
        autoprefixer: {}
    }
}
```

Now let's install babel and configure babel with all the necessary parts to guarantee a fully functional development environment for modern javascript development.

Run:

```npm install --save-dev @babel/core @babel/preset-env @babel/preset-react @babel/preset-typescript```

Then add ".babelrc" file in the root folder of the theme.

Inside this file add the following configuration JSON code:

```json
{
    "presets": ["@babel/preset-env", "@babel/preset-react", "@babel/preset-typescript"]
}
```

Now let's add some TSX (React-Typescript) code:

First, inside 'src' add 'index.tsx' and paste this sample code to test:

```js
import { createRoot } from 'react-dom/client'
import './styles/main.css'  // This code is to import tailwind css

const rootElement = document.querySelector('#root')
const root = createRoot((rootElement as HTMLElement))

root.render(<h1>Hello World!</h1>)

alert("This code works");
```

**NOTE:** Make sure that you've added `<div id="root"></div>` in the `index.php` file.

The last two steps are:
- Build the code running 'npm run start'
- Add the built code to the frontend adding inside the server side code located at 'inc/class-mm-assets.php' with PHP and WP Hooks:

```php
    wp_enqueue_script('main', MM_URL . 'build/index.js', ['react-dom', 'react'], '1.0.0', [ 'in_footer' => true]);

    wp_enqueue_style( 'main', MM_URL . '/build/index.css', null, null);
```

Now save the file, and go on the home page of your wordpress theme, you should see an alert popup from Javascript and an "Hello World!" text rendered by React.

The font should be different thanks to TailwindCSS.

And this is everything!

Thanks for your attention.

**Michele Mincone - 14 November 2024 - From Italy with Love!**