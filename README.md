# phpmysql
PHP操作mysql，封装函数，简化操作
1：使用时，需要先创建对象，phpmysql
2：封装的方法：
    1：构造函数，需要传的参数为（'host','user','password'）
    2：query()传参为sql语句
    3：usedata()传参为使用的数据库名称
    4：getall()传参为获得数据的表名
    5：perdata()将数据分页输出，参数为：第一个参数是表名，第二个参数为目前所在的页数，第三个参数为每页输出的数据，默认值为5
    6：fdata()，将符合条件的数据输出（只能有一个条件）。第一个参数为表名，第二个参数为字段名称，第三个参数为条件
    7：delete()，删除数据，第一个参数为表名，第二个参数为字段名称，第三个参数为条件
    8：insert()，插入数据，第一个参数为表名，第二个参数为所插入数据的键值对
    9：updata()，更改数据，第一个参数为表名，第二个参数为需要更改的数据，以键值对做参数，第三个参数为条件（字段名称与条件组成键值对做参数）
    10：dfdata()，多条件查找数据，输出符合多个条件的数据，第一个参数为表名，第二个参数为条件（字段名称和条件组成键值对作为参数），第三个参数为逻辑运算符，只支持and和or
    11:logical()函数，通过运算符过滤数据，输出数据，第一个参数为表名，第二个参数为字段名称和条件的键值对组成的数组，第三个参数为运算符，支持=,!=,>,<,>=,=<等运算符
    12：specifice()函数，将所需要的字段数据输出。第一个参数为表名，第二个参数为所需要输出的字段名称（将所需要的字段名称作为一个数组传入）。
    13：effectnum()函数，将返回上一次所影响的行数，不需要参数。
    14：allupdata()函数，将一条数据的所有字段全部更新，第一个参数为表名，第二个参数为按照数据库字段名称为顺序，每个字段的数据排列成为一个数组，以数组的形式作为参数，第三个参数为符合更改的条件，以一个键值对作为参数。与updata不同的是，此函数必须将一条数据的所有字段数据全部传入.
