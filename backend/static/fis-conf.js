//发布目录
fis.match('*', {
    release: '$0'
});

//发布路径 --相对路径
fis.hook('relative');
fis.match('**', {relative: true});

//资源压缩
fis.match('*.js', {
        optimizer: fis.plugin('uglify-js', {
            mangle: {
                expect: ['require', 'define']
            }
        })
    })
    .match('*.css', {
        optimizer: fis.plugin('clean-css', {
            'keepBreaks': false
        })
    })
    .match('*.{js,css,png}', {
        useHash: false
    });
//图片压缩
fis.match('*.png', {
    optimizer: fis.plugin('png-compressor', {
        // pngcrush or pngquant default is pngcrush
        type: 'pngquant'
    })
});

//资源编译
fis.match('**.less', {
    parser: fis.plugin('less'), // invoke `fis-parser-less`,
    rExt: '.css'
});
fis.match('**.{sass,scss}', {
    parser: fis.plugin('sass'), // invoke `fis-parser-sass`,
    rExt: '.css'
});

//忽略文件
fis.set('project.ignore', [
    'node_modules/**',
    'libs/',
    '.git/**',
    '.svn/**',
    '.idea/**',
    'fis-conf.js',
    'readme.txt'
]);