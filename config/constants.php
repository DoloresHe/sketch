<?php

return [
   'items_per_page' => 10,//当一页只看某个内容，显示多少内容
   'items_per_part' => 5,//当一个分区只看一个内容，显示多少内容
   'index_per_page' => 20,//当只搜索目录信息的时候，一页显示多少项目
   'index_per_part' => 2,//当index用于整合页面的时候，一个分区显示多少项目
   'comments_per_post' => 3,//每个post，显示最早的n-1条回复
   'update_min' => 1000, //章节更新必须达到这个水平才能进入排名榜
   'longcomment_lenth' => 200, //“长评”必须达到该字数
   'default_user_group' => 10,
   'default_majia' => '匿名咸鱼',

   'book_info' =>[
      'originality_info' => [
         0 => '同人',
         1 => '原创',
      ],
      'book_lenth_info' => [
         '1' => '短篇',
         '2' => '中篇',
         '3' => '长篇',
      ],
      'book_status_info' => [
         '1' => '连载',
         '2' => '完结',
         '3' => '暂停',
      ],
      'sexual_orientation_info' => [ //0:未知，1:BL，2:GL，3:BG，4:GB，5:混合性向，6:无CP，7:其他性向
        '0' => '性向未知',
        '1' => 'BL',
        '2' => 'GL',
        '3' => 'BG',
        '4' => 'GB',
        '5' => '混合性向',
        '6' => '无CP',
        '7' => '其他性向',
      ],
   ],
   'administrations' => [
      1 => '锁帖主题',
      2 => '解锁主题',
      3 => '转为私密主题',
      4 => '转为公开主题',
      5 => '删帖主题',
      6 => '恢复主题',
      7 => '删除回帖',
      8 => '删除点评',
      9 => '转移板块',
      10 => '修改马甲',
      11 => '折叠帖子',
      12 => '解折帖子',
      13 => '禁言用户',
      14 => '解禁用户',
   ],
   'activities' => [
      '1' => '回复主题',
      '2' => '回复帖子',
      '3' => '点评帖子',
   ],
   'level_up' => [
      1 => [//
         'experience_points' => 20,
         'xianyu' => 0,
         'sangdian' => 0,
      ],
      2 => [//可以下载图书（含回帖方式）
         'experience_points' => 50,
         'xianyu' => 10,
         'sangdian' => 0,
      ],
      3 => [//可以下载图书（脱水方式）
         'experience_points' => 100,
         'xianyu' => 25,
         'sangdian' => 0,
      ],
      4 => [//
         'experience_points' => 300,
         'xianyu' => 30,
         'sangdian' => 10,
      ],
      5 => [//可以按扣除咸鱼／丧点的方式发私信给陌生人（未做）
         'experience_points' => 500,
         'xianyu' => 50,
         'sangdian' => 15,
      ],
   ],
   'word_filter' => [
       'not_in_public' => "|骚浪|骚浪贱|NP|np|Np|nP|高H|高h|强制爱|处男|处女|恋童癖|恋童|3P|骑乘|play|纯肉|滥交|NTR|性癖|扶她|扶他|自慰|强上|啪啪啪|调♂教|调教|鸡巴|J8|撸|双性|产子|♂|淫荡|荡妇|爱液|按摩棒|拔出来|爆草|暴干|暴奸|暴乳|爆乳|暴淫|被操|被插|被干|逼奸|插暴|插爆|操逼|肏|潮吹|抽插|抽送|后穴|淫液|操烂|吞精|春药|发浪|发骚|粉穴|菊穴|干死你|肛交|肛门|龟头|AV|GV|巨屌|口爆|口暴|口活|口交|狂操|浪叫|凌辱|乱交|乱伦|裸陪|轮暴|轮奸|迷奸|强暴|全裸|人妻|人兽|肉棒|肉具|骚逼|骚水|乳交|乳沟|射颜|颜射|熟女|调教|小穴|小逼|性交|性奴|性虐|胸推|穴口|阳具|体位|舔脚|文爱|文做|要射了|淫贱|淫媚|淫糜|援交|欲火|QJ|qj|lj|LJ|lt|LT|幼幼|TJ|BDSM|艹哭|草哭|yj|jy|双龙入洞|骚货|淫乱|汁水|开苞|双穴|嫩穴|插穴|骚穴|子宫|宫口|产乳|喷奶|操射|射精|精液|射尿|灌肠|rbq|肉便器|Y蒂|H图|发情|潮喷|潮吹|失禁|",

       'not_in_title' => "|【|】|X|╳|<|>|〈|〉|",
   ],
];
