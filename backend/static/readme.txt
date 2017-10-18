静态文件发布

环境：

    fis3 + nodeJs  使用npm安装fis3依赖的包

发布步骤：

    1、切换到static目录 cd /path/to/static

    2、执行命令发布 fis3 release -d ../web/assets

说明：

    在没有fis3发布环境时，可以手动修改相应文件并拷贝到web/static下的对应目录，也可以复制整个static替换web/static

