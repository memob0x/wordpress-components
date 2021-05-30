import sass from 'node-sass';
import postcss from 'postcss';
import postcssscss from 'postcss-scss';
import postcsscriticalcss from 'postcss-critical-css';
import autoprefixer from 'autoprefixer';

export default async (data, from, outputDirectoryPath, outputFilename) => await postcss([
    autoprefixer(),

    postcsscriticalcss({
        outputPath: outputDirectoryPath,

        outputDest: outputFilename.replace('.css', '-critical.css')
    })
]).process(
    sass.renderSync({
        data,

        outputStyle: 'compressed'
    }).css,

    {
        from,

        to: `${outputDirectoryPath}/${outputFilename}`,

        syntax: postcssscss
    }
);
