sql语句
//查询
select * from table ;
死拉服特   斧ruang

//增加
insert into table (字段名1,字段名2,字段名3)values(字段值1,字段值2,字段值3);
阴色    阴吐                              歪溜死

//修改
update table set 字段名1 = 字段值1,字段名2 = 字段值2 where 条件
啊噗dei特     涩特

//删除
delete from table where 条件
D立特

//逻辑 与   &&  and        A 和  B  都成立
//    或   ||  or         A 或者 B  只要其中一个成立
//    非   !   not        不是A
//
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// and   or   not
select * from `table` where id<2 and shuliang=1;   两个条件都要满足
select * from `table` where time=4.8 or time=11.8; 两个条件只要满足其中一个
select * from `table` where not id>3;              取反

//进阶    where 子句
select * from `table` where (id=3 or id=4) and shuliang= 125;    //注意or要用括号括起来

// like 模糊查询（全/右）  _ 匹配一个字符   %模糊查询
select * from `table` where banzu like '_延%';


//between 范围限定运算符   10~15之间   就是少写大于小于号 不常用
select * from `table` where id between 10 and 15;

//in 运算符  就是查询多个 的意思   多个or
select *from `table` where name in('牛批','牛皮');

//is 运算符
select *from `table` where danwei = '' or danwei is null;  字段值为null 才可以这样 如果是 空字符集 就要  banzu = ''

//group by 分组   查询每个班组出现的次数 ！！！聚合函数 ->这五个 count()是记录次数 avg()平均值 max()最大值 min()最小值 sum()相加
   格入泼  败
//round()函数用于把数值字段舍入为指定的小数位数。
select banzu,count(banzu) as 次数 ,
			 round(AVG(shuliang),2) as 平均数量 ,
			 MAX(shuliang) as 最大数量 ,
			 MIN(shuliang) as 最小数量 ,
			 SUM(shuliang) as 相加数量
					from `table` GROUP BY banzu;

//having 子句  其实就是where一样的效果
   哈瑞
select banzu, round(avg(shuliang),2) 平均值 from `table` GROUP BY banzu  HAVING banzu='韩延刚';

//order by 排序顺序  正序 asc   倒叙desc  如果不写就是正序
   欧德  拜
select * from `table` order by id desc;

//limit
  李密特
select * from `table` order by id desc limit 0,3;



// default   可以自增长ID
insert into `table` VALUES(default,1.1,2,3,4,5,6);

//稍微高级一点的 insert into   算是批量插入
insert into `table`(id,time,guige,danwei,shuliang)values(4844,4.11,'牛批',100*100,50),
                                                        (4845,4.11,'牛批',100*100,50),
                                                        (4846,4.11,'牛批',100*100,50),
                                                        (4847,4.11,'牛批',100*100,50);

// insert into user表接收user ,pass字段的user1里的数据
insert into user (user,pass) select user ,'456' as pass from user1;


//insert into 语句的set语法
insert into user set user = '帅比',pass = 'jm123123';

//蠕虫复制   其实   上面的上面那个也是
insert into admin (user,pass) select user,pass from admin;




//  删除  倒序  删 从0开始的12个
delete from user order by id desc limit 12;


//联合查询  union
select id,f2 from tale1
union
select id2,f1 from table2
order by id desc limiti 9


//join  交叉连接  用的比较少  笛卡尔积也叫
select * from join1 join join2
            where id>2
            order by id desc
            limit 5;


//join  内连接(inner join)！！！
select * from test as t join test_uid as u
		on t.uid = u.id
		where t.uid = 1;

//left join  左外连接

select * from test as t left join test_uid as u
		on t.uid = u.id


// right join 右外连接
select * from test as t right join test_uid as u
		on t.uid = u.id


//自连接  面试问过  树状结构的数据   上下级关系

select a.name,b.name from diqu as a join diqu as b on a.uid = b.id;


//子查询 概念 在 一个正常的查询语句种又出现了了查询 比如   就是查询和 另外一个查询 做对比
// select * from 表 where shuliang >=(一个子查询语句);
select * from `table` where shuliang >(select avg(shuliang) from `table`);