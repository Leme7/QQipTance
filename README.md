# QQipTance
> ##本项目基于另一个GitHub开源项目：[https://github.com/Alisummer/QQIPDetector][1] 二次开发

##功能
探测某个或某些QQ用户的IP

##用法
1. 修改 `index.js` 的siteUrl，然后上传到服务器；
2. 如果你的网站是 `Apache` 环境，请开启伪静态模块(mod_rewrite)，且不要把根目录的 `.htaccess` 删除，否则你的网站会变得不安全，因为用到了 `SQLite` 数据库，数据库文件存放在 `/sqlite/qqiptance.db`；
3. 如果你的网站是 `Nginx` 环境，请将 `nginx.conf` 里的规则放到server里。

  [1]: https://github.com/Alisummer/QQIPDetector
