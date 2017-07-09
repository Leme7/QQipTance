# QQipTance
> ## 本项目基于另一个GitHub开源项目：[https://github.com/Alisummer/QQIPDetector][1] 二次开发


## 功能
探测某个或某些QQ用户的IP


## 用法
1. 修改 `index.js` 的siteUrl，然后上传到服务器；
2. 如果你的网站是 `Apache` 环境，请开启伪静态模块(mod_rewrite)，且不要把根目录的 `.htaccess` 删除，否则你的网站会变得不安全，因为用到了 `SQLite` 数据库，数据库文件存放在 `/sqlite/qqiptance.db`；
3. 如果你的网站是 `Nginx` 环境，请将 `nginx.conf` 里的规则放到server里。


## 执照
QQIPDetector根据GNU通用公共许可证v3（GPL-3）（[http://www.gnu.org/copyleft/gpl.html][2]）进行许可。

## 最后
第一次使用GitHub，有些地方还有些不太懂的，比如我是基于上述所说的开源项目二次开发的（获取到的IP数据改为储存在本地<SQLite数据库>），原作者说让我注明出处，不知道这样合不合理...


  [1]: https://github.com/Alisummer/QQIPDetector
  [2]: http://www.gnu.org/copyleft/gpl.html
  [3]: https://tc.image.52miku.cn/o_1bkj0t2bc1ub08bk10go11lt1h10a.png
