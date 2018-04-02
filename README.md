# 简单的PHP MVC框架

### 概要
此为一个搭建好路由分发的简单MVC框架，主要结构如下：
- 布局：layout/main.php
- 控制器：app/controllers
- 模型类：app/models
- 视图类：app/views

### 访问方法
例子：`http://localhost/easy-mvc/index.php/Article/update?a_id=2`
- 访问的控制器为：`Article`
- 访问的方法为：`update`
- 访问的参数为：`a_id=2`