import fs from 'fs/promises';

export default async path => await fs.readFile(path, 'utf-8');
