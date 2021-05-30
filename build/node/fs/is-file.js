import fs from 'fs/promises';

export default async path => (await fs.lstat(path)).isFile();
