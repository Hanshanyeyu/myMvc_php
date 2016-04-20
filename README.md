# myMvc_php

### 更新情况:
	- 2016/04/16 : 搭建基础框架， index.php + mvc.php
	- 2016/04/15 : 增加多路径，多模块, eg:Admin
	- 2016/04/19 : 修改并新增命名空间引用



### 搭建笔记：
#### 结构
![路径结构](http://7xs4zd.com1.z0.glb.clouddn.com/mymvc.jpg)


#### index.php
入口文件,主要是require 'mvc.php'
可以在index.php增加下http头部处理，如跨域访问等.

#### mvc.php
核心文件,主要包含环境变量，url路由


#### functions.php
包含自定义的功能函数


#### controller.php
控制器父类，主要集成一些魔术方法.


