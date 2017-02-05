**task任务管理系统**
===================

###一.背景
	现在跑定时任务大多是直接在机器上加crontab -e来搞,这样脚本运行多长时间,占用多少内存,有没有异常都不知道,会极大对业务带来隐患。

###二.目标
1. 可视化形式管理
2. 可增删改查
3. 有日志输出,日志里展示内存,运行时间相关重要信息
4. 脚本出现异常,要及时报警
5. 支持分钟，天，周，月，年任务五种类型# task

CREATE TABLE `task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(1) unsigned NOT NULL COMMENT '类型 1:分钟任务  2:天任务  3:周任务   4:月任务  5: 年任务',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '任务名称',
  `server` varchar(100) NOT NULL DEFAULT '' COMMENT '服务器',
  `command` varchar(255) NOT NULL DEFAULT '' COMMENT '执行命令',
  `run_state` int(1) NOT NULL DEFAULT '2' COMMENT '运行状态 1 禁用 2 等待运行 3 正在运行',
  `hour` varchar(10) NOT NULL DEFAULT '' COMMENT '小时',
  `minute` varchar(10) NOT NULL DEFAULT '' COMMENT '分钟',
  `month` varchar(10) NOT NULL DEFAULT '' COMMENT '月',
  `operator` varchar(100) NOT NULL DEFAULT '' COMMENT '操作人',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务表';