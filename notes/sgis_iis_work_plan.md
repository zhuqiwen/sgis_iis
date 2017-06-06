## modules

1. authentication
   1. access control
2. internship approval
   1. student
   2. internship
   3. internship_site
   4. internship_supervisor
   5. ​
3. alum management
4. 进度管理
5. 可视化报表
6. 数据导入
7. 数据导出


## 流程
1. internship module
    1. 学生注册：填写实习注册表相关信息
    2. 然后签署风险说明书
    3. 提交注册，等待审核
    4. 一旦学生提交注册，就产生一个新task（因此需要一个task表，来记录进度）
    5. 学生填写实习注册时，应当采用逐步引导：

2. 学生界面：
    1. 首次使用
        1. iuid，iu_username
        2. password，first name, middle name, last name
        3. 然后跳转回学生log in界面
    2. 已注册过
        1. 直接登录
        2. 新建internship application
            1. 选择organization
                1. 如果没有，则新建
            2. 选择location
                1. country
                    1. 选择完country后，自动监测country是否在危险名单中
                       1. 每24或12小时，自动去https://travel.state.gov/content/passports/en/alertswarnings.html抓取危险区域列表
                2. state/province
                3. city
                
            3. 自动判断是否有该organization在此location的supervisor信息
                1. 如有，则提供给学生选择
                    1. 如果没有学生的supervisor，则有学生新建/填写
                2. 如没有，则由学生填写
                    1. supervisor name
                    2. supervisor email
                    3. supervisor phone
            4. 填写liability release form
            5. 填写dates
                1. U.S. Departure/Return (Travel) Dates:
                2. Internship/Volunteer Experience (Work) Start/End Dates:
            6. detailed budget
                1. airfare; 
                2. living costs; 
                3. accommodations；
                4. etc.)
            6. 填写工作细节
                1. detailed description of the internship experience and your specific duties
                2. work schedule(number of hours per week)
            

## 