import readFileJsonConfig from './read-file-json-config.js';

export default async root => await readFileJsonConfig(root, '.babelrc');
